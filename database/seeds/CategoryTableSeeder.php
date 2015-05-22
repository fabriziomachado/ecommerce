<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Models\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder{

    public function run() {

        DB::table('categories')->truncate();

//        Category::create([
//            'name' => 'Category 1',
//            'description' => 'Description for category 1'
//        ]);

        $faker = Faker::create();
        foreach (range(1,15) as $i) {
            Category::create([
                'name' => $faker->word(),
                'description' => $faker->sentence()
            ]);
        }

    }

}