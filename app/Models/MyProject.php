<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyProject extends Model
{
    protected $table = 'my_project';
    protected $fillable = ['user_id', 'project_name', 'project_description', 'project_link', 'project_technology', 'project_image'];
}
