<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'description'=>$this->faker->paragraph(rand(15,50)),
            'category_id'=>rand(1,4),
            'subcategory_id' => rand(1,4),
            'price' => rand(540,5000),
            'image' => 'product/unname.jpg'
        ];
    }
}
