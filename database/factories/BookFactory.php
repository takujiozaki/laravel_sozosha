<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'user_id'=>User::factory(),
            'user_id'=>function(){
                return User::factory()->create()->id;
            },
            'title'=>$this->faker->realText(30),
            'ISBN_CODE'=>$this->faker->numerify('9784#########'),
            'author'=>$this->faker->name(),
            'published_at'=>$this->faker->date('Y-m-d'),
        ];
    }
}
