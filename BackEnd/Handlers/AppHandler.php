<?php
// Start session and output buffering
session_start();
ob_start();

final class App
{
    public static $IsLoggedIn = false;
    public static $_Redirect = [];

    public static function init()
    {
        self::$IsLoggedIn = $_SESSION['IsLoggedIn'] ?? false;
        $Backend = $_SERVER['DOCUMENT_ROOT'] . "/BackEnd/";
        self::$_Redirect['ADMIN_PAGE']  = $Backend . "AdminPage.php";
        self::$_Redirect['HOME_PAGE']   =  "/PublicPage.php";
        self::$_Redirect['FUNCTIONS']   = $Backend . "functions/";
        self::$_Redirect['HANDLERS']    = $Backend . "Handlers/";
        self::$_Redirect['PAGES']       = $Backend . "Pages/";
        self::$_Redirect['STORAGE']     = $Backend . "storage/";
        self::$_Redirect['BACK_CSS']    = $Backend . "css/";
        self::$_Redirect['ADMIN_PAGES'] = $Backend . "AdminPages/";
    }

    public static function login()
    {
        self::$IsLoggedIn = true;
        $_SESSION['IsLoggedIn'] = true;
    }

    public static function logout()
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        session_destroy();
        self::$IsLoggedIn = false;
    }
}

class Account
{
    public $Username;
    public $Password;

    public function __construct($Username, $Password)
    {
        $this->Username = $Username;
        $this->Password = $Password;
    }

    public function get_Username()
    {
        return $this->Username;
    }

    public function get_Password()
    {
        return $this->Password;
    }
}

final class Accounts
{
    private static $accounts = [];

    public static function init()
    {
        self::$accounts = [
            new Account('adrian', 'TgX42&j!'),
            new Account('Philart', '1234'),
        ];
    }

    public static function checkAccount(Account $Account)
    {
        foreach (self::$accounts as $_ValidAccount) {
            if (
                $Account->get_Username() === $_ValidAccount->get_Username()
                && $Account->get_Password() === $_ValidAccount->get_Password()
            ) {
                return true;
            }
        }
        return false;
    }
}

// Initialize static data
Accounts::init();
App::init();
