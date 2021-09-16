<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mychan extends Model
{
    use HasFactory;

    /* SE GUARDA */
    protected $fillable = ['goto', 'remarkID', 'user', 'content', 'visitor', 'email', 'password', 'nick', 'subtitle', 'description', 'by', 'title'];
}
