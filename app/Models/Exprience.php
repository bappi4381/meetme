<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exprience extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title',
        'year',
        'logo',
    ];
}
