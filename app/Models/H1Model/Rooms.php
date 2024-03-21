<?php

namespace App\Models\H1Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $table = 'hrms_h1_room_types';
    protected $fillable = [
        'RoomTypeID',
        'RoomType',
        'RoomNumber',
        'RoomStatus',
        'MaxGuests',
        'Description'
    ];
}
