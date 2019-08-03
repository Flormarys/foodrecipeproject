<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class AvailableIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $letterToUse = ['a', 'b', 'c', 'd', 'e', 'f'];
        $client = new Client();
        $allIngredients = [];
        $now = date('Y-m-d H:i:s');
        foreach ($letterToUse as $letter) {
            $response = $client
                ->request(
                    'GET',
                    "https://api.spoonacular.com/food/ingredients/autocomplete?" .
                    "query=$letter&number=100&metaInformation=true&apiKey=c5c136ed8d36442a8ece991083b4bd20"
                );
            $ingredients = json_decode($response->getBody());
            foreach ($ingredients as $ing) {
                $allIngredients[] = [
                    'name' => $ing->name,
                    'api_id' => $ing->id,
                    'update_at' => $now,
                    'created_at' => $now
                ];
            }
        }
        DB::table('available_ingredients')->insert($allIngredients);
    }
}
