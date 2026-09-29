<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;



class GameSeeder extends Seeder
{
    public function run()
{
    Game::insert([
        ['name' => 'Mobile Legends', 'image' => 'images/ml.jpg', 'category' => 'moba'],
        ['name' => 'Free Fire', 'image' => 'images/ff.jpg', 'category' => 'fps'],
        ['name' => 'Magic Chess Go Go', 'image' => 'images/magic.jpg', 'category' => 'strategy'],
        ['name' => 'PUBG Mobile', 'image' => 'images/pubg.jpg', 'category' => 'fps'],
        ['name' => 'E-Football', 'image' => 'images/efb.jpg', 'category' => 'sports'],
        ['name' => 'Roblox', 'image' => 'images/roblox.jpg', 'category' => 'rpg'],
        ['name' => 'Genshin Impact', 'image' => 'images/genshin.jpg', 'category' => 'rpg'],
        ['name' => 'Call of Duty Mobile', 'image' => 'images/codm.jpg', 'category' => 'fps'],        
        ['name' => 'Honor of Kings', 'image' => 'images/hok.jpg', 'category' => 'moba'],
        ['name' => 'Valorant', 'image' => 'images/valorant.jpg', 'category' => 'fps'],
    ]);
}
}
