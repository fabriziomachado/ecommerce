<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Models\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder{

    public function run() {
        DB::table('products')->truncate();

        $faker = Faker::create();
        foreach (range(1,40) as $i) {

            Product::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2,9,1000),
                'category_id' => $faker->numberBetween(1,15)
            ]);
        }
    }
}