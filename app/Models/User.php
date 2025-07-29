<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payment_list_id',
        'email',
        'email_verification_code',
        'email_verification_code_gen_date',
        'email_verified_at',
        'password',
        'name',
        'last_name',
        'phone',
        'business_name',
        'business_no',
        'trading_name',
        'address',
        'city',
        'state',
        'post_code',
        'country',
        'profile',
        'business_date',
        'book_date',
        'vat_register',
        'vat_scheme',
        'vat_reg_no',
        'vat_date',
        'vat_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userlist()
    {
        return $this->belongsTo(Paymentlists::class, 'payment_list_id');
    }

    public function payment()
    {
        return $this->hasMany(Payments::class, 'user_id');
    }
    
     public function invoice()
    {
        return $this->hasMany(Invoice::class, 'user_id');
    }
   
}
