<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'hrms_r3_payment';
    protected $fillable = [
        'acc_id',
        'invoice_no',
        'customer_name',
        'customer_email',
        'payment_method',
        'payment_status',
        'status'
    ];
}
