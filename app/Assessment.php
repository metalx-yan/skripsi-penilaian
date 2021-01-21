<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = ['nik', 'name', 'soal1', 'soal2', 'soal3', 'soal4', 'soal5','grade'];
}
