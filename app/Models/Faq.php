<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table ='faqs';
    protected $fillable =[
         'question', 
         'faq_category',
         'answer',
    ];
}
