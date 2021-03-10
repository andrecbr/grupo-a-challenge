<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'ra';
    protected $fillable = ['name', 'email', 'cpf'];
}
