<?php

namespace Database\Factories;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Favorite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url(),
            'title' => $this->faker->sentence($nbWords = 2),
            'description' => $this->faker->text($maxNbChars = 200),
            'visibility' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'user_id' => \App\Models\User::all()->random()->id
        ];
    }
}
