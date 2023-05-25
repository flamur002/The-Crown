<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPrice extends Model
{
    protected $table = 'room_prices';
    protected $fillable = ['room_type', 'room_price'];
    protected $primaryKey = 'room_type';
    public $timestamps = false;
    use HasFactory;
}
