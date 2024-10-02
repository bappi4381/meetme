<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', 
        'title', 
        'content',
    ];
    public function author()
    {
        return $this->belongsTo(User::class); // Adjust 'user_id' to your actual foreign key
    }
}
