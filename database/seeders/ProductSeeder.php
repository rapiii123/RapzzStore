<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    public function run()
{
    Product::insert([
        // Mobile Legends (game_id: 1) - 10 products
        ['name' => 'Weekly Diamond Pass', 'price' => 28500, 'game_id' => 1, 'image' => 'images/wdp.jpg'],
        ['name' => 'Starlight Member', 'price' => 27500, 'game_id' => 1, 'image' => 'images/starlight.jpg'],
        ['name' => '12 Diamond', 'price' => 3000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '25 Diamond', 'price' => 5000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '50 Diamond', 'price' => 10000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '86 Diamond', 'price' => 20000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '172 Diamond', 'price' => 40000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '258 Diamond', 'price' => 59000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '344 Diamond', 'price' => 79000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '430 Diamond', 'price' => 99000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '516 Diamond', 'price' => 119000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '602 Diamond', 'price' => 139000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '722 Diamond', 'price' => 169000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],
        ['name' => '1000 Diamond', 'price' => 239000, 'game_id' => 1, 'image' => 'images/diamond-ml.jpg'],

        // Free Fire (game_id: 2) - 10 products
        ['name' => '50 Diamond', 'price' => 10000, 'game_id' => 2, 'image' => 'images/diamond-ff.jpg'],
        ['name' => '100 Diamond', 'price' => 18000, 'game_id' => 2, 'image' => 'images/diamond-ff.jpg'],
        ['name' => '150 Diamond', 'price' => 24000, 'game_id' => 2, 'image' => 'images/diamond-ff.jpg'],
        ['name' => '300 Diamond', 'price' => 48000, 'game_id' => 2, 'image' => 'images/diamond-ff.jpg'],
        ['name' => '500 Diamond', 'price' => 79000, 'game_id' => 2, 'image' => 'images/diamond-ff.jpg'],
        ['name' => '1000 Diamond', 'price' => 159000, 'game_id' => 2, 'image' => 'images/diamond-ff.jpg'],
        ['name' => '1500 Diamond', 'price' => 239000, 'game_id' => 2, 'image' => 'images/diamond-ff.jpg'],
        ['name' => '2000 Diamond', 'price' => 319000, 'game_id' => 2, 'image' => 'images/diamond-ff.jpg'],
        ['name' => '3000 Diamond', 'price' => 479000, 'game_id' => 2, 'image' => 'images/diamond-ff.jpg'],
        ['name' => '5000 Diamond', 'price' => 799000, 'game_id' => 2, 'image' => 'images/diamond-ff.jpg'],

        // Magic Rush (game_id: 3) - 10 products
        ['name' => '50 Diamond', 'price' => 8000, 'game_id' => 3, 'image' => 'images/diamond-magic.jpg'],
        ['name' => '100 Diamond', 'price' => 15000, 'game_id' => 3, 'image' => 'images/diamond-magic.jpg'],
        ['name' => '200 Diamond', 'price' => 30000, 'game_id' => 3, 'image' => 'images/diamond-magic.jpg'],
        ['name' => '500 Diamond', 'price' => 75000, 'game_id' => 3, 'image' => 'images/diamond-magic.jpg'],
        ['name' => '1000 Diamond', 'price' => 150000, 'game_id' => 3, 'image' => 'images/diamond-magic.jpg'],
        ['name' => '1500 Diamond', 'price' => 225000, 'game_id' => 3, 'image' => 'images/diamond-magic.jpg'],
        ['name' => '2000 Diamond', 'price' => 299000, 'game_id' => 3, 'image' => 'images/diamond-magic.jpg'],
        ['name' => '3000 Diamond', 'price' => 449000, 'game_id' => 3, 'image' => 'images/diamond-magic.jpg'],
        ['name' => '5000 Diamond', 'price' => 749000, 'game_id' => 3, 'image' => 'images/diamond-magic.jpg'],
        ['name' => '10000 Diamond', 'price' => 1499000, 'game_id' => 3, 'image' => 'images/diamond-magic.jpg'],

        // PUBG Mobile (game_id: 4) - 10 products
        ['name' => '30 UC', 'price' => 8000, 'game_id' => 4, 'image' => 'images/uc-pubg.jpg'],
        ['name' => '60 UC', 'price' => 15000, 'game_id' => 4, 'image' => 'images/uc-pubg.jpg'],
        ['name' => '120 UC', 'price' => 30000, 'game_id' => 4, 'image' => 'images/uc-pubg.jpg'],
        ['name' => '250 UC', 'price' => 59000, 'game_id' => 4, 'image' => 'images/uc-pubg.jpg'],
        ['name' => '500 UC', 'price' => 119000, 'game_id' => 4, 'image' => 'images/uc-pubg.jpg'],
        ['name' => '1000 UC', 'price' => 239000, 'game_id' => 4, 'image' => 'images/uc-pubg.jpg'],
        ['name' => '1500 UC', 'price' => 359000, 'game_id' => 4, 'image' => 'images/uc-pubg.jpg'],
        ['name' => '2000 UC', 'price' => 479000, 'game_id' => 4, 'image' => 'images/uc-pubg.jpg'],
        ['name' => '3000 UC', 'price' => 719000, 'game_id' => 4, 'image' => 'images/uc-pubg.jpg'],
        ['name' => '5000 UC', 'price' => 1199000, 'game_id' => 4, 'image' => 'images/uc-pubg.jpg'],

        // Endless Frontier Battle (game_id: 5) - 10 products
        ['name' => '50 Coins', 'price' => 8000, 'game_id' => 5, 'image' => 'images/coins-efb.jpg'],
        ['name' => '100 Coins', 'price' => 18000, 'game_id' => 5, 'image' => 'images/coins-efb.jpg'],
        ['name' => '200 Coins', 'price' => 36000, 'game_id' => 5, 'image' => 'images/coins-efb.jpg'],
        ['name' => '500 Coins', 'price' => 89000, 'game_id' => 5, 'image' => 'images/coins-efb.jpg'],
        ['name' => '1000 Coins', 'price' => 179000, 'game_id' => 5, 'image' => 'images/coins-efb.jpg'],
        ['name' => '2000 Coins', 'price' => 359000, 'game_id' => 5, 'image' => 'images/coins-efb.jpg'],
        ['name' => '3000 Coins', 'price' => 539000, 'game_id' => 5, 'image' => 'images/coins-efb.jpg'],
        ['name' => '5000 Coins', 'price' => 899000, 'game_id' => 5, 'image' => 'images/coins-efb.jpg'],
        ['name' => '10000 Coins', 'price' => 1799000, 'game_id' => 5, 'image' => 'images/coins-efb.jpg'],
        ['name' => '15000 Coins', 'price' => 2699000, 'game_id' => 5, 'image' => 'images/coins-efb.jpg'],

        // Roblox (game_id: 6) - 10 products
        ['name' => '40 Robux', 'price' => 7500, 'game_id' => 6, 'image' => 'images/robux.jpg'],
        ['name' => '80 Robux', 'price' => 15500, 'game_id' => 6, 'image' => 'images/robux.jpg'],
        ['name' => '160 Robux', 'price' => 31000, 'game_id' => 6, 'image' => 'images/robux.jpg'],
        ['name' => '320 Robux', 'price' => 62000, 'game_id' => 6, 'image' => 'images/robux.jpg'],
        ['name' => '800 Robux', 'price' => 155000, 'game_id' => 6, 'image' => 'images/robux.jpg'],
        ['name' => '1600 Robux', 'price' => 310000, 'game_id' => 6, 'image' => 'images/robux.jpg'],
        ['name' => '2000 Robux', 'price' => 388000, 'game_id' => 6, 'image' => 'images/robux.jpg'],
        ['name' => '4500 Robux', 'price' => 775000, 'game_id' => 6, 'image' => 'images/robux.jpg'],
        ['name' => '10000 Robux', 'price' => 1550000, 'game_id' => 6, 'image' => 'images/robux.jpg'],
        ['name' => '20000 Robux', 'price' => 3100000, 'game_id' => 6, 'image' => 'images/robux.jpg'],

        // Genshin Impact (game_id: 7) - 10 products
        ['name' => '50 Genesis Crystal', 'price' => 12000, 'game_id' => 7, 'image' => 'images/crystal-genshin.jpg'],
        ['name' => '100 Genesis Crystal', 'price' => 25000, 'game_id' => 7, 'image' => 'images/crystal-genshin.jpg'],
        ['name' => '200 Genesis Crystal', 'price' => 50000, 'game_id' => 7, 'image' => 'images/crystal-genshin.jpg'],
        ['name' => '500 Genesis Crystal', 'price' => 125000, 'game_id' => 7, 'image' => 'images/crystal-genshin.jpg'],
        ['name' => '1000 Genesis Crystal', 'price' => 249000, 'game_id' => 7, 'image' => 'images/crystal-genshin.jpg'],
        ['name' => '2000 Genesis Crystal', 'price' => 499000, 'game_id' => 7, 'image' => 'images/crystal-genshin.jpg'],
        ['name' => '3000 Genesis Crystal', 'price' => 749000, 'game_id' => 7, 'image' => 'images/crystal-genshin.jpg'],
        ['name' => '5000 Genesis Crystal', 'price' => 1249000, 'game_id' => 7, 'image' => 'images/crystal-genshin.jpg'],
        ['name' => '10000 Genesis Crystal', 'price' => 2499000, 'game_id' => 7, 'image' => 'images/crystal-genshin.jpg'],
        ['name' => '20000 Genesis Crystal', 'price' => 4999000, 'game_id' => 7, 'image' => 'images/crystal-genshin.jpg'],

        // Call of Duty Mobile (game_id: 8) - 10 products
        ['name' => '20 CP', 'price' => 6500, 'game_id' => 8, 'image' => 'images/cp-codm.jpg'],
        ['name' => '40 CP', 'price' => 12500, 'game_id' => 8, 'image' => 'images/cp-codm.jpg'],
        ['name' => '85 CP', 'price' => 26000, 'game_id' => 8, 'image' => 'images/cp-codm.jpg'],
        ['name' => '170 CP', 'price' => 53000, 'game_id' => 8, 'image' => 'images/cp-codm.jpg'],
        ['name' => '340 CP', 'price' => 106000, 'game_id' => 8, 'image' => 'images/cp-codm.jpg'],
        ['name' => '680 CP', 'price' => 212000, 'game_id' => 8, 'image' => 'images/cp-codm.jpg'],
        ['name' => '1000 CP', 'price' => 309000, 'game_id' => 8, 'image' => 'images/cp-codm.jpg'],
        ['name' => '2000 CP', 'price' => 618000, 'game_id' => 8, 'image' => 'images/cp-codm.jpg'],
        ['name' => '3200 CP', 'price' => 988000, 'game_id' => 8, 'image' => 'images/cp-codm.jpg'],
        ['name' => '6500 CP', 'price' => 1979000, 'game_id' => 8, 'image' => 'images/cp-codm.jpg'],

        // Honor of Kings (game_id: 9) - 10 products
        ['name' => '500 Honor Coins', 'price' => 10000, 'game_id' => 9, 'image' => 'images/hok.jpg'],
        ['name' => '1000 Honor Coins', 'price' => 21000, 'game_id' => 9, 'image' => 'images/hok.jpg'],
        ['name' => '2000 Honor Coins', 'price' => 42000, 'game_id' => 9, 'image' => 'images/hok.jpg'],
        ['name' => '5000 Honor Coins', 'price' => 105000, 'game_id' => 9, 'image' => 'images/hok.jpg'],
        ['name' => '10000 Honor Coins', 'price' => 210000, 'game_id' => 9, 'image' => 'images/hok.jpg'],
        ['name' => '20000 Honor Coins', 'price' => 420000, 'game_id' => 9, 'image' => 'images/hok.jpg'],
        ['name' => '30000 Honor Coins', 'price' => 630000, 'game_id' => 9, 'image' => 'images/hok.jpg'],
        ['name' => '50000 Honor Coins', 'price' => 1050000, 'game_id' => 9, 'image' => 'images/hok.jpg'],
        ['name' => '100000 Honor Coins', 'price' => 2099000, 'game_id' => 9, 'image' => 'images/hok.jpg'],
        ['name' => '200000 Honor Coins', 'price' => 4199000, 'game_id' => 9, 'image' => 'images/hok.jpg'],

        // Valorant (game_id: 10) - 10 products
        ['name' => '75 VP', 'price' => 10500, 'game_id' => 10, 'image' => 'images/points-valo.jpg'],
        ['name' => '125 VP', 'price' => 17500, 'game_id' => 10, 'image' => 'images/points-valo.jpg'],
        ['name' => '250 VP', 'price' => 35000, 'game_id' => 10, 'image' => 'images/points-valo.jpg'],
        ['name' => '500 VP', 'price' => 70000, 'game_id' => 10, 'image' => 'images/points-valo.jpg'],
        ['name' => '1000 VP', 'price' => 140000, 'game_id' => 10, 'image' => 'images/points-valo.jpg'],
        ['name' => '2000 VP', 'price' => 279000, 'game_id' => 10, 'image' => 'images/points-valo.jpg'],
        ['name' => '2500 VP', 'price' => 349000, 'game_id' => 10, 'image' => 'images/points-valo.jpg'],
        ['name' => '3000 VP', 'price' => 419000, 'game_id' => 10, 'image' => 'images/points-valo.jpg'],
        ['name' => '5000 VP', 'price' => 699000, 'game_id' => 10, 'image' => 'images/points-valo.jpg'],
        ['name' => '10000 VP', 'price' => 1399000, 'game_id' => 10, 'image' => 'images/points-valo.jpg'],
    ]);
}
}
