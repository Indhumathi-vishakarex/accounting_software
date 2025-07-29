<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'payment';

    protected $fillable = [
        'user_id',
        'card_holder_name',
        'card_last_four',
        'exp_month',
        'exp_year',
        'stripe_payment_id',
        'amount',
        'currency',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
