<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name'=>'Iseel',
            'email'=>'iseel@hotmail.com',
            'password'=>bcrypt('password'),
            'role_id'=>1,
            'phone' => 43214555,
            'lastName' => 'Alhlees'
        ],

        );

        User::create([
            'name'=>'mousa',
            'email'=>'mousa@hotmail.com',
            'password'=>bcrypt('password'),
            'is_admin'=>1,
            'phone' => 43214555,
            'lastName' => 'alshawwa'
        ],

        );
        $categories = ['laptop','Mobile','Television','Electronic','clothes','shoes'];
        foreach ($categories as $key=>$value){
            Category::create(['name'=>$value,'slug'=>Str::slug($value),
                'description'=>'This is Description Data','image'=>'img/log.png']);
        }

        $subcategories = ['HP','Dell','Sony','Nike','addidas','Samsung'];
        foreach ($subcategories as $key=>$value){
            SubCategory::create(['name'=>$value,'category_id'=>rand(1,6)]);
        }

        Product::factory(3)->create();
    }
}
