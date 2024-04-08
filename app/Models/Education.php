<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [ 'user_id', 'degree', 'institute', 'start_date', 'end_date', 'description'];
}
