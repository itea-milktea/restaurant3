<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartPaymentInformation extends Model
{
    use HasFactory;
    protected $table = 'hrms_r3_cart_payment';
    protected $fillable = [
        'payment_id',
        'account_id',
        'item_name',
        'category',
        'quantity',
        'status',
        'total_price',
    ];
}
