<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

include 'Helpers.php';

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    public function run(Faker $faker): void
    {

        for($i = 0; $i < 100; $i++){

            $new_player = new Player();

            $generatedNumbers = [];

            do {
                $new_player->ranking = $faker->numberBetween(1, 100);
            }while (in_array($new_player->ranking, $generatedNumbers));

            $generatedNumbers [] = $new_player->ranking;

            $new_player->name = $faker->name(['gender' => 'male']);
            $new_player->image = $faker->image(null, 360, 360, 'animals', true, true, 'cats', true, 'jpg');
            if (empty($new_player->image)) {
                $new_player->image = asset('images/Federer_01-1080x675.png') ;
            }

            $new_player->age = $faker->numberBetween(18, 38);
            $new_player->weight = $faker->numberBetween(60, 90);
            $new_player->height = $faker->numberBetween(165, 220);
            $new_player->points = $faker->numberBetween(600, 12000);
            $new_player->country = $faker->state();
       
            $new_player->save();

        };
    }
}
