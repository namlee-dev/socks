<?php

namespace Socks\Controllers;

use Socks\Utils\Message;
use Socks\Models\User;
use Socks\Models\Motif;
use Socks\Models\Pattern;
use Socks\Models\Size;

class AdminController extends CoreController
{
    /**
     * Display the admin page
     */
    public function admin()
    {
        $motifListe = Motif::findAll();
        $patternList = Pattern::findAll();
        $this->show('admin/admin', [
            'motifListe' => $motifListe,
            'patternList' => $patternList,
            'token' => $this->createToken(),
        ]);
    }

    // STEP User
    /**
     * Display the users list
     */
    public function userList()
    {
        $users = User::findAll();

        $this->show('admin/user_list', [
            'users' => $users,
        ]);
    }

    /**
     * Add an user
     */
    public function userAdd()
    {
        $errorMessageList = [];
        $user = new User();

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the data from the form
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

            // Set the data in DB
            $user->setName($name);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setRole($role);

            // Verify the user data : first name
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
            // Verify the user data : password
            if (empty($password)){
                $errorMessageList [] = Message::$passwordFr;
            }
            // Verify the user data : role
            if (empty($role)){
                $errorMessageList [] = Message::$role;
            }

            // If there is no error
            if (count($errorMessageList) == 0) {
                // Save the user
                $user->save();
                // Redirect to the users list
                header('Location: ' . $this->router->generate('user-list'));
                exit;
            }
        }

        // Display the form
        $this->show('admin/user_form', [
            'action' => 'Ajouter',
            'errorMessageList' => $errorMessageList,
            'token' => $this->createToken(),
            'user' => $user,
        ]);
    }

    /**
     * Edit an user
     *
     * @param int $id
     */
    public function userEdit(int $id)
    {
        $errorMessageList = [];
        $user = User::find($id);

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the data from the form
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

            // Set the data in DB
            $user->setName($name);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setRole($role);

            // Verify the user data : first name
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
            // Verify the user data : password
            if (empty($password)){
                $errorMessageList [] = Message::$passwordFr;
            }
            // Verify the user data : role
            if (empty($role)){
                $errorMessageList [] = Message::$role;
            }

            // If there is no error
            if (count($errorMessageList) == 0) {
                // Save the user
                $user->save();
                // Redirect to the users list
                header('Location: ' . $this->router->generate('user-list'));
                exit;
            }
        }

        // Display form
        $this->show('admin/user_form', [
            'action' => 'Modifier',
            'errorMessageList' => $errorMessageList,
            'token' => $this->createToken(),
            'user' => $user,
        ]);
    }

    /**
     * Delete an user and redirect to the user list
     *
     * @param int $id
     */
    public function userDelete(int $id)
    {
        // Find the user
        $user = User::find($id);

        // Delete the user and redirect to the users list
        $user->delete($id);
        header('Location: ' . $this->router->generate('user-list'));
        exit;
    }

    // STEP Pattern in French
    /**
     * Display the French patterns list
     */
    public function motifList()
    {
        $motifs = Motif::findAll();
        $this->show('admin/pattern_list', [
            'motifs' => $motifs,
        ]);
    }

    /**
     * Add a pattern in French
     */
    public function motifAdd()
    {
        // dump($_POST);

        $errorMessageList = [];
        $editedMotif = new Motif();

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the data from the form
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $yarn = filter_input(INPUT_POST, 'yarn');
            $needles = filter_input(INPUT_POST, 'needles');
            $gauge = filter_input(INPUT_POST, 'gauge', FILTER_SANITIZE_STRING);
            $material = filter_input(INPUT_POST, 'material', FILTER_SANITIZE_STRING);
            $pattern = filter_input(INPUT_POST, 'pattern');
            $legStart = filter_input(INPUT_POST, 'legStart');
            $legEnd = filter_input(INPUT_POST, 'legEnd', FILTER_SANITIZE_STRING);
            $chart = filter_input(INPUT_POST, 'chart', FILTER_SANITIZE_STRING);

            // Set the data in DB
            $editedMotif->setName($name);
            $editedMotif->setYarn($yarn);
            $editedMotif->setNeedles($needles);
            $editedMotif->setGauge($gauge);
            $editedMotif->setMaterial($material);
            $editedMotif->setPattern($pattern);
            $editedMotif->setLegStart($legStart);
            $editedMotif->setLegEnd($legEnd);
            $editedMotif->setChart($chart);

            // Verify the user data : name
            if (empty($name)){
                $errorMessageList [] = Message::$patternNameFr;
            }
            // Verify the user data : yarn
            if (empty($yarn)){
                $errorMessageList [] = Message::$yarnFr;
            }
            // Verify the user data : needles
            if (empty($needles)){
                $errorMessageList [] = Message::$needlesFr;
            }
            // Verify the user data : gauge
            if (empty($gauge)){
                $errorMessageList [] = Message::$gaugeFr;
            }
            // Verify the user data : material
            if (empty($material)){
                $errorMessageList [] = Message::$materialFr;
            }
            // Verify the user data : pattern
            if (empty($pattern)){
                $errorMessageList [] = Message::$patternFr;
            }

            // If there is no error
            if (count($errorMessageList) == 0) {
                // Save the user
                $editedMotif->save();
                // Redirect to the users list
                header('Location: ' . $this->router->generate('pattern-list'));
                exit;
            }
        }

        // Display the form
        $this->show('admin/pattern_form', [
            'action' => 'Ajouter',
            'errorMessageList' => $errorMessageList,
            'token' => $this->createToken(),
            'editedMotif' => $editedMotif,
        ]);
    }

    /**
     * Edit a pattern in French
     */
    public function motifEdit($id)
    {
        // dump($_POST);

        $errorMessageList = [];
        $editedMotif = Motif::findId($id);

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the data from the form
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $yarn = filter_input(INPUT_POST, 'yarn');
            $needles = filter_input(INPUT_POST, 'needles');
            $gauge = filter_input(INPUT_POST, 'gauge', FILTER_SANITIZE_STRING);
            $material = filter_input(INPUT_POST, 'material', FILTER_SANITIZE_STRING);
            $pattern = filter_input(INPUT_POST, 'pattern');
            $legStart = filter_input(INPUT_POST, 'legStart');
            $legEnd = filter_input(INPUT_POST, 'legEnd', FILTER_SANITIZE_STRING);
            $chart = filter_input(INPUT_POST, 'chart', FILTER_SANITIZE_STRING);

            // Set the data in DB
            $editedMotif->setName($name);
            $editedMotif->setYarn($yarn);
            $editedMotif->setNeedles($needles);
            $editedMotif->setGauge($gauge);
            $editedMotif->setMaterial($material);
            $editedMotif->setPattern($pattern);
            $editedMotif->setLegStart($legStart);
            $editedMotif->setLegEnd($legEnd);
            $editedMotif->setChart($chart);

            // Verify the user data : name
            if (empty($name)){
                $errorMessageList [] = Message::$patternNameFr;
            }
            // Verify the user data : yarn
            if (empty($yarn)){
                $errorMessageList [] = Message::$yarnFr;
            }
            // Verify the user data : needles
            if (empty($needles)){
                $errorMessageList [] = Message::$needlesFr;
            }
            // Verify the user data : gauge
            if (empty($gauge)){
                $errorMessageList [] = Message::$gaugeFr;
            }
            // Verify the user data : material
            if (empty($material)){
                $errorMessageList [] = Message::$materialFr;
            }
            // Verify the user data : pattern
            if (empty($pattern)){
                $errorMessageList [] = Message::$patternFr;
            }

            // If there is no error
            if (count($errorMessageList) == 0) {
                // Save the user
                $editedMotif->save();
                // Redirect to the users list
                header('Location: ' . $this->router->generate('pattern-list'));
                exit;
            }
        }

        // Display the form
        $this->show('admin/pattern_form', [
            'action' => 'Modifier',
            'errorMessageList' => $errorMessageList,
            'token' => $this->createToken(),
            'editedMotif' => $editedMotif,
        ]);
    }

    /**
     * Delete a pattern and redirect to the pattern list
     *
     * @param int $id
     */
    public function motifDelete(int $id)
    {
        // Find the pattern
        $motif = Motif::findId($id);

        // Delete the pattern and redirect to the pattern list
        $motif->delete($id);
        header('Location: ' . $this->router->generate('pattern-list'));
        exit;
    }

    // STEP Pattern in English

    /**
     * Display the English patterns list
     */
    public function patternList()
    {
        $patterns = Pattern::findAll();
        $this->showEn('admin/pattern_list', [
            'patterns' => $patterns,
        ]);
    }

    /**
     * Add a pattern in English
     */
    public function patternAdd()
    {
        // dump($_POST);

        $errorMessageList = [];
        $editedPattern = new Pattern();

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the data from the form
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $yarn = filter_input(INPUT_POST, 'yarn');
            $needles = filter_input(INPUT_POST, 'needles');
            $gauge = filter_input(INPUT_POST, 'gauge', FILTER_SANITIZE_STRING);
            $material = filter_input(INPUT_POST, 'material', FILTER_SANITIZE_STRING);
            $pattern = filter_input(INPUT_POST, 'pattern');
            $legStart = filter_input(INPUT_POST, 'legStart');
            $legEnd = filter_input(INPUT_POST, 'legEnd', FILTER_SANITIZE_STRING);
            $chart = filter_input(INPUT_POST, 'chart', FILTER_SANITIZE_STRING);

            // Set the data in DB
            $editedPattern->setName($name);
            $editedPattern->setYarn($yarn);
            $editedPattern->setNeedles($needles);
            $editedPattern->setGauge($gauge);
            $editedPattern->setMaterial($material);
            $editedPattern->setPattern($pattern);
            $editedPattern->setLegStart($legStart);
            $editedPattern->setLegEnd($legEnd);
            $editedPattern->setChart($chart);

            // Verify the user data : name
            if (empty($name)){
                $errorMessageList [] = Message::$patternName;
            }
            // Verify the user data : yarn
            if (empty($yarn)){
                $errorMessageList [] = Message::$yarn;
            }
            // Verify the user data : needles
            if (empty($needles)){
                $errorMessageList [] = Message::$needles;
            }
            // Verify the user data : gauge
            if (empty($gauge)){
                $errorMessageList [] = Message::$gauge;
            }
            // Verify the user data : material
            if (empty($material)){
                $errorMessageList [] = Message::$material;
            }
            // Verify the user data : pattern
            if (empty($pattern)){
                $errorMessageList [] = Message::$pattern;
            }

            // If there is no error
            if (count($errorMessageList) == 0) {
                // Save the user
                $editedPattern->save();
                // Redirect to the users list
                header('Location: ' . $this->router->generate('pattern-list-en'));
                exit;
            }
        }

        // Display the form
        $this->showEn('admin/pattern_form', [
            'action' => 'Add',
            'errorMessageList' => $errorMessageList,
            'token' => $this->createToken(),
            'editedPattern' => $editedPattern,
        ]);
    }

    /**
     * Edit an pattern in English
     */
    public function patternEdit($id)
    {
        // dump($_POST);

        $errorMessageList = [];
        $editedPattern = Pattern::findId($id);

        // If the URL is in POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the data from the form
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $yarn = filter_input(INPUT_POST, 'yarn');
            $needles = filter_input(INPUT_POST, 'needles');
            $gauge = filter_input(INPUT_POST, 'gauge', FILTER_SANITIZE_STRING);
            $material = filter_input(INPUT_POST, 'material', FILTER_SANITIZE_STRING);
            $pattern = filter_input(INPUT_POST, 'pattern');
            $legStart = filter_input(INPUT_POST, 'legStart');
            $legEnd = filter_input(INPUT_POST, 'legEnd', FILTER_SANITIZE_STRING);
            $chart = filter_input(INPUT_POST, 'chart', FILTER_SANITIZE_STRING);

            // Set the data in DB
            $editedPattern->setName($name);
            $editedPattern->setYarn($yarn);
            $editedPattern->setNeedles($needles);
            $editedPattern->setGauge($gauge);
            $editedPattern->setMaterial($material);
            $editedPattern->setPattern($pattern);
            $editedPattern->setLegStart($legStart);
            $editedPattern->setLegEnd($legEnd);
            $editedPattern->setChart($chart);

            // Verify the user data : name
            if (empty($name)){
                $errorMessageList [] = Message::$patternName;
            }
            // Verify the user data : yarn
            if (empty($yarn)){
                $errorMessageList [] = Message::$yarn;
            }
            // Verify the user data : needles
            if (empty($needles)){
                $errorMessageList [] = Message::$needles;
            }
            // Verify the user data : gauge
            if (empty($gauge)){
                $errorMessageList [] = Message::$gauge;
            }
            // Verify the user data : material
            if (empty($material)){
                $errorMessageList [] = Message::$material;
            }
            // Verify the user data : pattern
            if (empty($pattern)){
                $errorMessageList [] = Message::$pattern;
            }

            // If there is no error
            if (count($errorMessageList) == 0) {
                // Save the user
                // dump($editedPattern);
                $editedPattern->save();
                // Redirect to the users list
                header('Location: ' . $this->router->generate('pattern-list-en'));
                exit;
            }
        }

        // Display the form
        $this->showEn('admin/pattern_form', [
            'action' => 'Edit',
            'errorMessageList' => $errorMessageList,
            'token' => $this->createToken(),
            'editedPattern' => $editedPattern,
        ]);
    }

    /**
     * Delete a pattern and redirect to the pattern list
     *
     * @param int $id
     */
    public function patternDelete(int $id)
    {
        // Find the pattern
        $pattern = Pattern::findId($id);

        // Delete the pattern and redirect to the patterns list
        $pattern->delete($id);
        header('Location: ' . $this->router->generate('pattern-list-en'));
        exit;
    }

    /**
     * Get pattern in all sizes
     */
    public function getPattern()
    {
        if (!empty($_POST['french'])) {
            // Retrieve the data from form
            $motifFromForm = filter_input(INPUT_POST, 'motif');
            // Find the pattern
            $motif = Motif::find($motifFromForm);
            // Retrieve all sizes
            $tailles = Size::findAll();

            // Retrieve the user informations to get the user role
            $currentUser = $_SESSION['userObject'];
            $userRole = $currentUser->getRole();

            if ($userRole === 'admin') {
                // Display the pattern
                $this->show('admin/all_sizes', [
                    'tailles' => $tailles,
                    'motif' => $motif,
                ]);
            }
        }

        if (!empty($_POST['english'])) {
            // Retrieve the data from form
            $patternFromForm = filter_input(INPUT_POST, 'pattern');
            // Find the pattern
            $pattern = Pattern::find($patternFromForm);
            // Retrieve all sizes
            $sizes = Size::findAll();

            // Retrieve the user informations to get the user role
            $currentUser = $_SESSION['userObject'];
            $userRole = $currentUser->getRole();

            if ($userRole === 'admin') {
                // Display the pattern
                $this->showEn('admin/all_sizes', [
                    'sizes' => $sizes,
                    'pattern' => $pattern,
                ]);
            }
        }
    }
}
