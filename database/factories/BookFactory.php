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
            'title'=>$this->faker->realText(20),
            //'ISBN'=>$this->faker->numerify("9784#########"),
            'ISBN'=>$this->faker->isbn13(),
            'author'=>$this->faker->name(),
            'published_at'=>$this->faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now')->format("Y-m-d"),
            //'user_id'=>User::factory(),
            // 'user_id'=>function(){
            //     return User::factory()->create()->id;
            // },
        ];
    }
}
