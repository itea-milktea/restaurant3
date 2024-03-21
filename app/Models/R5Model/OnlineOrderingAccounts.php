<?php

namespace App\Models\R5Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineOrderingAccounts extends Model
{
    use HasFactory;
    protected $table = 'hrms_r5_cart_accounts';
    protected $fillable = [
        'acc_id',
        'category',
        'title',
        'price',
        'quantity',
        'images',
    ];
}
