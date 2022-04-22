<?php

namespace Database\Factories;

use App\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
    	return [
    	    'gender' => $gender = $this->faker->randomElement(['male','female']),
            'name' => $this->faker->name($gender),
            'country' => $this->faker->country,
    	];
    }
}
