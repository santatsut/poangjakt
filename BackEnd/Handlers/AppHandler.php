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

        $Backend = $_SERVER['DOCUMENT_ROOT'].'/BackEnd/';

        self::$_Redirect = [
            'ADMIN_PAGE' => '/BackEnd/Pages/AdminPage.php',
            'HOME_PAGE' => '/PublicPage.php',
            'FUNCTIONS' => $Backend.'functions/',
            'HANDLERS' => $Backend.'Handlers/',
            'PAGES' => '/BackEnd/Pages/',
            'STORAGE' => $Backend.'storage/',
            'BACK_CSS' => $Backend.'css/',
            'ADMIN_PAGES' => $Backend.'AdminPages/',
        ];
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
    public static $accounts = [];

    public static function init()
    {
        foreach (DB::getAdminData() as $account) {
            self::$accounts[] = new Account($account['Username'], $account['Password']);
        }
    }

    public static function checkAccount(Account $Account)
    {
        foreach (self::$accounts as $_ValidAccount) {
            if (
                $Account->get_Username() === $_ValidAccount->get_Username()
                && $Account->get_Password() === $_ValidAccount->get_Password()
            ) {
                $_SESSION['Logged_User'] = $Account;

                return true;
            }
        }

        return false;
    }
}
final class DB
{
    public static $Data;
    public static $DATA_PATH;
    public static $AdminAccountsPath;

    public static $AdminData;

    public static function init()
    {
        self::$DATA_PATH = APP::$_Redirect['STORAGE'].'/data.json';
        self::$AdminAccountsPath = APP::$_Redirect['STORAGE'].'/AdminAccounts.json';
        self::loadData();
        self::loadAdminData();
    }

    public static function setData(array $value)
    {
        self::$Data = $value;
    }

    public static function getData()
    {
        return self::$Data;
    }

    public static function getAdminData()
    {
        return self::$AdminData;
    }

    public static function loadData()
    {
        $json = file_get_contents(self::$DATA_PATH) ?: '[]';
        self::$Data = json_decode($json, true) ?: [];
    }

    public static function WriteData(array $List)
    {
        $Encoded_Data = json_encode($List, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?: [];
        $res = file_put_contents(self::$DATA_PATH, $Encoded_Data);
        if ($res !== false) {
            self::loadData();
        }
    }

    public static function loadAdminData()
    {
        $json = file_get_contents(self::$AdminAccountsPath) ?: '[]';
        self::$AdminData = json_decode($json, true) ?: [];
    }

    public static function WriteAdminData(array $List)
    {
        $Encoded_Data = json_encode($List, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?: [];
        $res = file_put_contents(self::$AdminAccountsPath, $Encoded_Data);
        if ($res !== false) {
            self::loadAdminData();
        }
    }
}

// Initialize static data
App::init();
DB::init();
Accounts::init();
