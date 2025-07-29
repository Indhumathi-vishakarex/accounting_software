<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    protected $fillable =[
        'user_id',
        'invoice_id',
        'amount',
        'type',

];
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function payment()
{
    return $this->belongsTo(Payments::class, 'user_id', 'user_id');
}

// public function transaction()
// {
//     return $this->belongsTo(Transaction::class, 'merchant_id', 'merchant_id');
// }

}
