<?php
//Modelo de Usuarios para manejar la base de datos con abstrabcion 3
namespace Bootstrap\Models;

use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
// Lista de columnas modificables en USERS table
    protected $fillable=
    [
        'username',
        'password',
        'email',
        'isadmin',
        'locale',
        'subusers',
        'sha2'
    ];

}