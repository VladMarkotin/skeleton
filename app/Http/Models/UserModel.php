<?php
namespace App\Http\Models;


use App\Http\Models\Model;

class UserModel extends Model
{
    protected $table = 'users';
    public $id;
    public $email;
    public $password;
    private $position = 0;

    public static function fromState( $state): UserModel
    {
        // validate state before accessing keys!
       
        return new self(
            $state['id'],
            $state['email'],
            $state['password'],
        );
    }

    public function __construct($id, $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }
}