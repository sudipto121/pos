<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attandance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'att_date', 'att_year', 'attandance', 'month'
    ];
}
