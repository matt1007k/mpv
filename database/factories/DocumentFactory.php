<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'full_name' => $this->faker->name(),
            'dni' => random_int(11111111, 99999999),
            'cell_phone' => random_int(910000000, 999999999),
            'address' => $this->faker->address(),
            'origin_place' => $this->faker->city(),
            'subject' => $this->faker->title(),
            'file' => $this->faker->url(),
            'user_id' => User::factory(),
        ];
    }
}
