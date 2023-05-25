<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoomPrice;

class RoomPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomPrices = [
            ['room_type' => 'standard', 'room_price' => 99],
            ['room_type' => 'deluxe', 'room_price' => 139],
            ['room_type' => 'family', 'room_price' => 189],
        ];

        foreach ($roomPrices as $roomPrice) {
            RoomPrice::create($roomPrice);
        }
    }
}
