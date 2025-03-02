<?php
namespace App\Kernel\Auth;


class AuthClass
{
    private static bool $isAuth = false;

    public static function authenticate(array $data)
    {
        //dd($data['id']);
        if ($data) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['nick'] = $data['nick'];
            self::$isAuth = true;
        }

    }

    public static function getAuth()
    {
        return self::$isAuth;
    }

    public static function getUserId()
    {
        if (isset($_SESSION['id'])) {
            return $_SESSION['id'];
        }

        return '';
    }

    public static function getUserNick()
    {
        if (isset($_SESSION['nick'])) {
            return $_SESSION['nick'];
        }

        return '';
    }

    public static function getUserEmail()
    {
        if (isset($_SESSION['email'])) {
            return $_SESSION['email'];
        }

        return '';
    }

    public static function logout()
    {
         // Удаляем все данные из сессии
        $_SESSION = [];
//die('test');
        // Удаляем cookie с идентификатором сессии (если установлена)
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            /*setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );*/
        }

        // Уничтожаем сессию
        session_destroy();

        // Перенаправляем пользователя на страницу входа или главную
        // header("Location: /login");
        // exit();
    }
}