<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['confirmation_code', 'booked_at', 'user_id', 'room_id', 'check_in_date', 'check_out_date', 'checked_in', 'checked_out', 'cancelled', 'cancelled_at', 'cancelled_by', 'cancellation_reason', 'price', 'guests'];

    public $timestamps=false;

}
