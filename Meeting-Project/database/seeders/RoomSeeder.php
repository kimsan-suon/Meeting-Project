<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::truncate();

        Room::create([
            'name' => 'Room 101',
            'description' => 'A spacious room for small meetings.',
            'image' => 'room1.png',  // Add image name here
            'price' => 15,
        ]);

        Room::create([
            'name' => 'Room 102',
            'description' => 'Ideal for conferences and large groups.',
            'image' => 'room2.jpg',
            'price' => 25,
        ]);

        Room::insert([
            ['name' => 'Room 103', 'description' => 'A modern conference room', 'image' => 'room3.jpg', 'price' => 20],
            ['name' => 'Room 104', 'description' => 'Spacious room with projector.', 'image' => 'room4.jpg', 'price' => 10],
            ['name' => 'Room 105', 'description' => 'Comfortable and well-lit room.', 'image' => 'room5.jpg', 'price' => 25],
            ['name' => 'Room 106', 'description' => 'Room with whiteboard and TV.', 'image' => 'room6.jpg', 'price' => 30],
        ]);
    }
}
