<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
       
        'supplier_name',
        'invoice_no',
        'invoice_date',
        'total_amount',
        'vat',
        'net',
        'sr',
        'zr',
         'bill_image',
        
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'total_amount' => 'decimal:2',
        'vat' => 'decimal:2',
        'net' => 'decimal:2',
        'sr' => 'decimal:2',
        'zr' => 'decimal:2',
    ];
    
    public function user()
{
    return $this->belongsTo(User::class);
}

}
