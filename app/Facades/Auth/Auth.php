<?php
namespace App\Facades\Auth;


use App\Kernel\Auth\AuthClass;
use App\Http\Models\UserModel;
use App\Kernel\DB\QueryBuilder\Builder;
use App\Kernel\DI\Container;
use App\Facades\Response\Response;

class Auth extends AuthClass
{
    private $nick;
    private $email;
    private AuthClass $auth;

    public function __construct(AuthClass $auth)
    {
        $this->auth = $auth;
    }

    public static function id()
    {
        return self::getUserId();
    }

    public static function isAuth()
    {
        return self::isAuth();
    }

    public static function auth(array $data)
    {
        $container = new Container();
        $builder = $container->get(Builder::class);
        $rows = $builder->select(['*'])
        ->from('users')
        ->where('email', '=', $data['email'])
        ->or('password', '=', $data['pass'])
        //->sql();
        ->get();
        
        //dd($rows);
        if (isset($rows[0]['id'])) {
            self::authenticate($rows[0]);
        }
    }

    public static function logout()
    {
        parent::logout();
    }
}