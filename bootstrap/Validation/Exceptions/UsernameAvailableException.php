<?php
namespace Bootstrap\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class UsernameAvailableException extends ValidationException
{
    public static $defaultTemplates=[
        self::MODE_DEFAULT => [
            self::STANDARD=> 'El Nombre de usuario ya esta en uso.',
        ]
    ];
}