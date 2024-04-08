<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myskill extends Model
{


    protected $table = 'my_skill';
    protected $fillable = ['user_id', 'skills'];

}
