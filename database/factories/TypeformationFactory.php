<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Typeformation;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Typeformation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'icone' => $this->faker->text(255),
        ];
    }
}
