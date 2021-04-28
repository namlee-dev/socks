<?php

namespace Socks\Controllers;

use Socks\Models\User;
use Socks\Utils\Message;

class UserController extends CoreController
{
    /**
     * Display the login page
     */
    public function login()
    {
        $errorMessageList = [];
        $profileMessageList = [];
        $user = new User;
        $_SESSION['userObject'] = '';

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the data from the form
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            // Search if the email exists in the DB with the findByEmail method
            $user = User::findByEmail($email);

            // If $user is an object User, the user has been found
            if ($user instanceof User) {
                // Verify the password
                if (password_verify($password, $user->getPassword())) {
                    // The password is good
                    // Add the informations in session
                    $_SESSION['userObject'] = $user;
                    // Redirect to home page
                    header('Location: ' . $this->router->generate('home'));
                    exit;
                } else {
                    // The mail is good but not the password
                    $errorMessageList [] = Message::$wrongLogin;
                }
            } else {
                // $user is not an object User, the email does not exists in DB
                $errorMessageList [] = Message::$wrongLogin;
            }

        }

        // Display the login page
        $this->showLogin('user/login', [
            'errorMessageList' => $errorMessageList,
            'profileMessageList' => $profileMessageList,
            'token' => $this->createToken(),
            'user' => $user,
        ]);
    }

    /**
     * Logout the user and redirect to the login page
     */
    public function logout()
    {
        session_unset();
        header('Location: ' . $this->router->generate('user-login'));
        exit;
    }

    /**
     * Form to ask to reset password
     */
    public function passwordRequest() {

        $errorMessageList = [];
        $profileMessageList = [];

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the data from the form
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            // Search if the email exists in the DB with the findByEmail method
            $user = User::findByEmail($email);
            // dump($user);

            $userRole= $user->getRole();
            if ($userRole === 'test') {
                // Display the password request page
                $this->show('error/error403');
                exit;
            } else {
                // Message if empty email
                if (empty($email)) {
                    $errorMessageList [] = Message::$emailFr;
                    $errorMessageList [] = Message::$email;
                }
                // If user exists
                else if ($user instanceof User) {
                    // Create a token
                    $resetToken = md5(time() . 'mettre la phrase qu\'on veut ou une autre' . time());
                }
                // Message if user does not exist
                else {
                    // $user is not an object User, the email does not exists in DB
                    $errorMessageList [] = Message::$wrongEmail;
                }

                if (count($errorMessageList) == 0) {
                    // Insert the token in DB
                    User::tokenResetPassword($email, $resetToken);

                    // Send an email with the token and a link to reset the password
                    $to = $email;
                    $subject = 'Réinitialisation de votre mot de passe sur socks.maillesnam.com / Reset your password on socks.maillesnam.com';
                    $body = '
                    <html>
                    <body>
                    <h1>Bonjour,</h1>
                    <p>Cliquez sur <a href="https://socks.maillesnam.com/public/password-reset?token=' . $resetToken . '">ce lien</a> pour réinitialiser votre mot de passe sur mon site.</p>
                    <h1>Hi there,</h1>
                    <p>Click on <a href="https://socks.maillesnam.com/public/password-reset?token=' . $resetToken . '">this link</a> to reset your password on my site</p>
                    <h1>Bon tricot, Good knitting</h1>
                    <p>(Mailles) Nam</p>
                    <a href="www.maillesnam.com">www.maillesnam.com</a>
                    </body>
                    </html>';
                    $headers  = "From: MaillesNam <info@maillesnam.com>" . "\r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    mail($to, $subject, $body, $headers);

                    // Message to the user
                    $profileMessageList [] = Message::$sendPasswordReset;
                }
            }
        }
        // Display the password request page
        $this->showLogin('user/password_request', [
            'errorMessageList' => $errorMessageList,
            'profileMessageList' => $profileMessageList,
            'token' => $this->createToken()
        ]);
    }

    public function passwordReset()
    {
        $errorMessageList = [];
        $profileMessageList = [];
        $resetToken = $_SESSION['token'];
        // dump($resetToken);

        // If the URL is in GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            // Display the password reset page
            $this->showLogin('user/password_reset', [
                'errorMessageList' => $errorMessageList,
                'profileMessageList' => $profileMessageList
            ]);
        }

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = User::findByToken($resetToken);
            $userEmail = $user->getEmail();

            $password = (string) filter_input(INPUT_POST,'password',FILTER_VALIDATE_REGEXP,['options'=>['regexp'=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*.{8,})(?=.*.[-|#%&*=@$])/']]);
            $confirmPassword = (string) filter_input(INPUT_POST,'confirmPassword', FILTER_VALIDATE_REGEXP,['options'=>['regexp'=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*.{8,})(?=.*.[-|#%&*=@$])/']]);

            // If password not match to regex
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*.{8,})(?=.*.[-|#%&*=@$])/';
            if (preg_match($pattern, $password) == false) {
                $errorMessageList[] = Message::$regexFr;
                $errorMessageList[] = Message::$regex;
            }
            // Verify the password and its confirmation
            if ($password !== $confirmPassword) {
                $errorMessageList[] = Message::$matchPasswordFr;
                $errorMessageList[] = Message::$matchPassword;
            }
            // Verify the user data : password
            if (empty($password)){
                $errorMessageList [] = Message::$passwordFr;
                $errorMessageList [] = Message::$password;
            }
            // Verify the user data : password confirmation
            if (empty($confirmPassword)){
                $errorMessageList [] = Message::$confirmPasswordFr;
                $errorMessageList [] = Message::$confirmPassword;
            }

            if (count($errorMessageList) == 0) {
                // Save the user
                $password = password_hash($password, PASSWORD_DEFAULT);
                $user->saveByToken($userEmail, $password);
                // Message to the user
                $profileMessageList [] = Message::$connectFr;
                $profileMessageList [] = Message::$connect;
            }

            // Display the password reset page
            $this->showLogin('user/password_reset', [
                'errorMessageList' => $errorMessageList,
                'profileMessageList' => $profileMessageList,
            ]);
        }
    }

    // STEP See account
    /**
     * Display the user account page in French
     */
    public function account()
    {
        // If the user is connected
        if (!empty($_SESSION['userObject'])){
            // Retrieve his informations
            $userConnected = $_SESSION['userObject'];
            // Get his ID
            $id = $userConnected->getId();
            // Find him
            $user = User::find($id);
            // Show his account
            $this->show('user/account', [
                'token' => $this->createToken(),
                'user' => $user,
            ]);
        } else {
            // If the user is not connected redirect to login page
            header ('Location: ' . $this->router->generate('user-login'));
            exit;
        }
    }

    /**
     * Display the user account page in English
     */
    public function accountEn()
    {
        // If the user is connected
        if (!empty($_SESSION['userObject'])){
            // Retrieve his informations
            $userConnected = $_SESSION['userObject'];
            // Get his ID
            $id = $userConnected->getId();
            // Find him
            $user = User::find($id);
            // Show his account
            $this->showEn('user/account', [
                'token' => $this->createToken(),
                'user' => $user,
            ]);
        } else {
            // If the user is not connected redirect to login page
            header ('Location: ' . $this->router->generate('user-login'));
            exit;
        }
    }

    // STEP Edit account
    /**
     * Edit your own account in French
     *
     * @param integer $id
     */
    public function accountEdit(int $id)
    {
        $errorMessageList = [];
        $profileMessageList = [];
        $user = User::find($id);

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the data from the form
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = (string) filter_input(INPUT_POST,'password',FILTER_VALIDATE_REGEXP,['options'=>['regexp'=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*.{8,})(?=.*.[-|#%&*=@$])/']]);
            $confirmPassword = (string) filter_input(INPUT_POST,'confirmPassword', FILTER_VALIDATE_REGEXP,['options'=>['regexp'=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*.{8,})(?=.*.[-|#%&*=@$])/']]);

            // Set the data in DB
            $user->setName($name);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setPassword($password);
            // dump($user);

            // Verify the user data : name
            if (empty($name)){
                $errorMessageList [] = Message::$nameFr;
            }
            // Verify the user data : last name
            if (empty($lastname)){
                $errorMessageList [] = Message::$lastnameFr;
            }
            // Verify the user data : email
            if (empty($email)){
                $errorMessageList [] = Message::$emailFr;
            }
            // If password not match to regex
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*.{8,})(?=.*.[-|#%&*=@$])/';
            if (preg_match($pattern, $password) == false) {
                $errorMessageList[] = Message::$regexFr;
            }
            // Verify the password and its confirmation
            if ($password !== $confirmPassword) {
                $errorMessageList[] = Message::$matchPasswordFr;
            }
            // Verify the user data : password
            if (empty($password)){
                $errorMessageList [] = Message::$passwordFr;
            }
            // Verify the user data : password confirmation
            if (empty($confirmPassword)){
                $errorMessageList [] = Message::$confirmPasswordFr;
            }

            // If there is no error
            if (count($errorMessageList) == 0) {
                // Save the user
                $user->save();
                // Message to the user
                $profileMessageList [] = Message::$updatedProfileFr;
            }
        }

        // Display form
        $this->show('user/account_edit', [
            'action' => 'Modifier',
            'errorMessageList' => $errorMessageList,
            'profileMessageList' => $profileMessageList,
            'token' => $this->createToken(),
            'user' => $user,
        ]);
    }

    /**
     * Edit your own account in English
     *
     * @param integer $id
     */
    public function accountEditEn(int $id)
    {
        $errorMessageList = [];
        $profileMessageList = [];
        $user = User::find($id);

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the data from the form
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = (string) filter_input(INPUT_POST,'password',FILTER_VALIDATE_REGEXP,['options'=>['regexp'=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*.{8,})(?=.*.[-|#%&*=@$])/']]);
            $confirmPassword = (string) filter_input(INPUT_POST,'confirmPassword',FILTER_VALIDATE_REGEXP,['options'=>['regexp'=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*.{8,})(?=.*.[-|#%&*=@$])/']]);

            // Set the data in DB
            $user->setName($name);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setPassword($password);
            // dump($user);

            // Verify the user data : name
            if (empty($name)){
                $errorMessageList [] = Message::$name;
            }
            // Verify the user data : lastname
            if (empty($lastname)){
                $errorMessageList [] = Message::$lastname;
            }
            // Verify the user data : email
            if (empty($email)){
                $errorMessageList [] = Message::$email;
            }
            // If password not match to regex
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*.{8,})(?=.*.[-|#%&*=@$])/';
            if (preg_match($pattern, $password) == false) {
                $errorMessageList[] = Message::$regex;
            }
            // Verify the password and its confirmation
            if ($password !== $confirmPassword) {
                $errorMessageList[] = Message::$matchPassword;
            }
            // Verify the user data : password
            if (empty($password)){
                $errorMessageList [] = Message::$password;
            }

            // Verify the user data : password confirmation
            if (empty($confirmPassword)){
                $errorMessageList [] = Message::$confirmPassword;
            }

            // If there is no error
            if (count($errorMessageList) == 0) {
                // Save the user
                $user->save();
                // Message to the user
                $profileMessageList [] = Message::$updatedProfile;
            }
        }

        // Display form
        $this->showEn('user/account_edit', [
            'action' => 'Modify',
            'errorMessageList' => $errorMessageList,
            'profileMessageList' => $profileMessageList,
            'token' => $this->createToken(),
            'user' => $user,
        ]);
    }
}