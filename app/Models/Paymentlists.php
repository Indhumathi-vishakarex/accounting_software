<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentlists extends Model
{
    use HasFactory;

    protected  $table ='payment_list';
    protected $fillable = [
       'type',
       'range',
       'price',
       'vat',
       'total_price',
       'start_date',
       'end_date'

   ];

    public function Accountuser()
   {
       return $this->belongsTo(User::class);
   }
}
