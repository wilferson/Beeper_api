<?php

namespace Bootstrap\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use Bootstrap\Models\User;

class UsernameAvailable extends AbstractRule
{
    public function validate($input)
    {
        return (User::where('username',$input)->count()===0);
    }

}