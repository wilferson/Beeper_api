<?php 

namespace Bootstrap\Auth;

use Bootstrap\Models\User;

class Auth
{
    public function user()
    {
        return User::find($_SESSION['user']);
    }
    public function check()
    {
        return isset($_SESSION['user']);
    }
    public function attempt( $args)
    {
        $user= User::where('email',$args['email'])->first();
        if (!$user){
            return false;
        }
       if (password_verify($args['password'], $user->password)){

           $_SESSION['user']=$user->id;
           return true;
       }
    }
    public function logout()
    {
        unset( $_SESSION['user']);
    }
}