<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'image',
        'fa_link',
        'li_link',
        'x_link',
        'git_link',
        'be_link',
        'dr_link',
        'phone',
        'email',
        'location',
        'cv_link',
        'obj',
    ];
}
