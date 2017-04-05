<?php

namespace Bootstrap\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use Bootstrap\Models\User;

class TokenCorrect extends AbstractRule
{
    public function validate($input,$email)
    {
        return password_verify($input,$email);
    }

}