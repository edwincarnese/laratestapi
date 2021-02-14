<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'photo' => $this->faker->imageUrl(),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->numerify('###-###-####'),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'birthdate' => $this->faker->dateTimeBetween('1900-01-01', '2020-12-31')
        ];
    }
}
