<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
     protected $fillable = ['plan_name', 'plan_type', 'price', 'duration', 'status'];

    // public function features()
    // {
    //     return $this->hasMany(Features::class);
    // }
}
