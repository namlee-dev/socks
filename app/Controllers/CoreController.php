<?php

namespace Socks\Controllers;

abstract class CoreController
{
    /**
     * Generate a route
     */
    protected $router;

    /**
     * Construct the $router, manage the permissions et the CSRF protection
     *
     * @param [type] $router
     */
    public function __construct($match, $router)
    {
        /* -----------
        --- ROUTER ---
        ------------*/
        // $router available everywhere
        $this->router = $router;

        /* ----------------
        --- PERMISSIONS ---
        -----------------*/
        // Retrieve the route name
        // If match has no knonw route name, it return false so show error 404
        // Else continue to the route
        if ($match === false) {
            $this->show('error/error404');
            exit;
        } else {
        $routeName = $match['name'];
        }

        // Permission array for routes => roles
        $acl = [
            'admin' => ['admin'],
            'admin-pattern' => ['admin'],

            'user-list' => ['admin'],
            'user-add' => ['admin'],
            'user-edit' => ['admin'],
            'user-delete' => ['admin'],

            'pattern-list' => ['admin'],
            'pattern-add' => ['admin'],
            'pattern-edit' => ['admin'],
            'pattern-delete' => ['admin'],

            'pattern-list-en' => ['admin'],
            'pattern-add-en' => ['admin'],
            'pattern-edit-en' => ['admin'],
            'pattern-delete-en' => ['admin'],

            'home' => ['test', 'user', 'admin'],
            'pattern' => ['test', 'user', 'admin'],
            'abbreviations' => ['test', 'user', 'admin'],
            'tutorials' => ['test', 'user', 'admin'],
            'gallery' => ['test', 'user', 'admin'],
            'user-account' => ['test', 'user', 'admin'],
            'user-account-edit' => ['user', 'admin'],

            'home-en' => ['test', 'user', 'admin'],
            'pattern-en' => ['test','user', 'admin'],
            'abbreviations-en' => ['test', 'user', 'admin'],
            'tutorials-en' => ['test', 'user', 'admin'],
            'gallery-en' => ['test', 'user', 'admin'],
            'user-account-en' => ['test', 'user', 'admin'],
            'user-account-edit-en' => ['user', 'admin'],
        ];

        // If the route is in the permission array
        if (array_key_exists($routeName, $acl)) {
            // Retrieve the permission list in a variable
            $authorizedRoles = $acl[$routeName];
            // Send this permission list to checkAuthorization()
            $this->checkAuthorization($authorizedRoles);
        }

        /* ----------
        --- CSRF ---
        ------------*/

        // If the route has an anti-CSRF mecanism, check
        $this->checkCSRF($routeName);
    }

    /**
     * Check if the user has the authotization to see the site
     *
     * @param array $rolesList
     */
    public function checkAuthorization(array $rolesList)
    {
        // If user is connected
        if (!empty($_SESSION['userObject'])) {
            // Retrieve the connected user information
            $currentUser = $_SESSION['userObject'];
            // Retrieve his role
            $userRole = $currentUser->getRole();

            // If the role is in the authorized roles (in parameters)
            if (in_array($userRole, $rolesList)) {
                // Return true
                return true;
            } else {
                // If the connected user has not the authorization to see the page
                // Send error 403 and display the error 403 page
                http_response_code(403);
                $this->show('error/error403');
                // Stop the script for not displaying the asked page
                die();
            }
        } else {
            // If the user is not connected, redirect to login page
            header('Location: ' . $this->router->generate('user-login'));
            exit;
        }
    }

    /**
     * Create token against CSRF attacks
     */
    public static function createToken()
    {
        // Create the token
        $token = md5(time() . 'mettre la phrase qu\'on veut ou une autre' . time());
        // Store it in session for verification
        $_SESSION['token'] = $token;
        // Return the token
        return $token;
    }

    /**
     * If necessary, check the presence of the anti-CSRF token
     *
     * @param string $routeName
     */
    public function checkCSRF(string $routeName)
    {
        // Routes that have to be protected in POST
        $csrfTokenToCheckInPost = [
            'user-login',

            'user-add',
            'user-edit',

            'pattern-add',
            'pattern-edit',
            'pattern-add-en',
            'pattern-edit-en',

            'user-account-edit',
            'user-account-edit-en',

            'pattern',
            'pattern-test',
            'pattern-en',
            'pattern-test-en',

            'admin-pattern',
        ];

        // Routes that have to be protected in GET
        $csrfTokenToCheckInGet = [
            'user-delete',
            'pattern-delete',
            'pattern-delete-en'
        ];

        // For POST
        // If it necessary to check the token
        if (in_array($routeName, $csrfTokenToCheckInPost) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the token in POST
            $token = isset($_POST['token']) ? $_POST['token'] : '';
            // Retrieve the token in SESSION
            $sessionToken = isset($_SESSION['token']) ? $_SESSION['token'] : '';

            // If they are not equal or empty
            if ($token !== $sessionToken || empty($token)) {
                // Display a 403 error
                http_response_code(403);
                $this->show('error/error403');
                // And be sure that no other instruction will be executed
                die();
            } else {
                // Delete the token in session so that it is unique
                unset($_SESSION['token']);
            }
        }

        // Idem for GET
        if (in_array($routeName, $csrfTokenToCheckInGet) && $_SERVER['REQUEST_METHOD'] == 'GET') {
            $token = isset($_GET['token']) ? $_GET['token'] : '';
            $sessionToken = isset($_SESSION['token']) ? $_SESSION['token'] : '';
            if ($token !== $sessionToken || empty($token)) {
                http_response_code(403);
                $this->show('error/error403');
                die();
            } else {
                unset($_SESSION['token']);
            }
        }
    }

    /**
     * Show login page
     *
     * @param string $viewName
     * @param array $viewVars
     */
    protected function showLogin(string $viewName, $viewVars = [])
    {
        $viewVars['currentPage'] = $viewName;
        $viewVars['absoluteURL'] = $_SERVER['BASE_URI'];
        $viewVars['assetsBaseUri'] = $_SERVER['BASE_URI'] . '/assets/';
        $viewVars['router'] = $this->router;

        extract($viewVars);
        // dump($viewVars);

        require __DIR__ . '/../Views/layout/header.tpl.php';
        require __DIR__ . '/../Views/' . $viewName . '.tpl.php';
    }

    /**
     * Display page in French
     *
     * @param [string] $viewName
     * @param array $viewVars
    */
    protected function show(string $viewName, $viewVars = [])
    {
        $viewVars['currentPage'] = $viewName;
        $viewVars['absoluteURL'] = $_SERVER['BASE_URI'];
        $viewVars['assetsBaseUri'] = $_SERVER['BASE_URI'] . '/assets/';
        $viewVars['router'] = $this->router;

        extract($viewVars);
        // dump($viewVars);

        require __DIR__ . '/../Views/layout/header.tpl.php';
        require __DIR__ . '/../Views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../Views/layout/footer.tpl.php';
    }

    /**
     * Display page in English
     *
     * @param [string] $viewName
     * @param array $viewVars
     */
    protected function showEn(string $viewName, $viewVars = [])
    {
        $viewVars['currentPage'] = $viewName;
        $viewVars['absoluteURL'] = $_SERVER['BASE_URI'];
        $viewVars['assetsBaseUri'] = $_SERVER['BASE_URI'] . '/assets/';
        $viewVars['router'] = $this->router;

        extract($viewVars);
        // dump($viewVars);

        require __DIR__ . '/../Views/layout/header_en.tpl.php';
        require __DIR__ . '/../Views/' . $viewName . '_en.tpl.php';
        require __DIR__ . '/../Views/layout/footer.tpl.php';
    }
}