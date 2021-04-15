<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 * PHP 7.3.27
 */

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Ingredients;

class AvailableIngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $allIngredients = [];
        $now = date('Y-m-d H:i:s');
        for ($i=0; $i<10; $i++) {
            $letter = chr(rand(97,122));
            $response = $client
                ->request(
                    'GET',
                    "https://api.spoonacular.com/food/ingredients/autocomplete?" .
                    "query=$letter&number=10&metaInformation=true&apiKey=c5c136ed8d36442a8ece991083b4bd20"
                );
            $ingredients = json_decode($response->getBody());
            foreach ($ingredients as $ing) {
                // Now we need complete unit. For that I need get Info in API //
                $idIng = $ing->id;
                $response2 = $client
                    ->request(
                        'GET',
                        "https://api.spoonacular.com/food/ingredients/$idIng/information" .
                        "?apiKey=3c12fdd3f3e441e6bfad202fff49de0e"
                    );
                $ingredientInfo = json_decode($response2->getBody());
                $unit = null;
                if (isset($ingredientInfo->shoppingListUnits)) {
                    $randomIndex = array_rand($ingredientInfo->shoppingListUnits);
                    $unit = $ingredientInfo->shoppingListUnits[$randomIndex];
                }
                $allIngredients[] = [
                    'name' => $ing->name,
                    'api_id' => $ing->id,
                    'updated_at' => $now,
                    'created_at' => $now,
                    'unit' => $unit
                ];
            }
        }
        DB::table('available_ingredients')->insert($allIngredients);

    }
}
