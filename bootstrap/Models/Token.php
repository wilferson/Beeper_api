<?php
//Modelo de Usuarios para manejar la base de datos con abstrabcion 3
namespace Bootstrap\Models;

use \Illuminate\Database\Eloquent\Model;

class Token extends Model
{
// Lista de columnas modificables en USERS table
    protected $fillable=
    [
       'AuthToken',
       'level',
    ];

}