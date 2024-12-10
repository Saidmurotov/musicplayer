<?php

namespace Database\Seeders;

use App\Models\Music;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Music::create([
            'name' => 'Song 1',
            'artist' => 'Artist 1',
            'file' => 'musics/seed1.mp3',
            'user_id' => 2, // Replace with an actual user ID
            'admin_confirmed' => true,
        ]);
    }
}
