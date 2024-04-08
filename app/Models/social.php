<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class social extends Model
{

    protected $table = 'social';
    protected $fillable = ['facebook', 'twitter', 'instagram', 'linkedin', 'github', 'user_id'];
}
