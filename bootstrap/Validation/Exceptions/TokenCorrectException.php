<?php
namespace Bootstrap\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class TokenCorrectException extends ValidationException
{
    public static $defaultTemplates=[
        self::MODE_DEFAULT => [
            self::STANDARD=> 'No concuerda el token',
        ]
    ];
}