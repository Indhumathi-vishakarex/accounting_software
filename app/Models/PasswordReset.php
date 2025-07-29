<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

     protected $table = 'password_resets';
    public $timestamps = true; 
     //defalut table created at or updated at any one is showing must use this 

    protected $fillable = [
        'email', 'token', 'otp', 'is_verified', 'expires_at'
    ];
    
    protected $casts = [
    'expires_at' => 'datetime',
];
}
