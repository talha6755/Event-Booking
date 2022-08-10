<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            "category_id"=>$this->faker->numberBetween(0,10),
            "event_name"=>$this->faker->name(),
            "event_address"=>$this->faker->address(),
            "no_of_attendres"=>$this->faker->numerify(),
            "price"=>$this->faker->numerify(),
            "start_date"=>$this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            "end_date"=>$this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            "start_time"=>$this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            "end_time"=>$this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            "publication_status"=>$this->faker->numerify(1),
            "cover_image"=>$this->faker->image(),
            "description"=>$this->faker->text(),
        ];
    }
}
