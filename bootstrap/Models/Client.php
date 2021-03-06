<?php
//Modelo de Usuarios para manejar la base de datos con abstrabcion 3
namespace Bootstrap\Models;

use \Illuminate\Database\Eloquent\Model;

class Client extends Model
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