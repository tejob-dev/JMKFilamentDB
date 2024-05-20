<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Accueilvideo;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccueilvideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accueilvideo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'videolien' => $this->faker->text(255),
        ];
    }
}
