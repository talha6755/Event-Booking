<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            "user_id"=>$this->faker->numberBetween(0,10),
            "category_name"=>$this->faker->name(),
            "thumbnail"=>$this->faker->image(),
            "publication_status"=>$this->faker->numerify(1),
        ];
    }
}
