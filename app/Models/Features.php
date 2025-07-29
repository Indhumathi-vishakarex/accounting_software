<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $fillable = ['subscription_plan_id', 'features'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
