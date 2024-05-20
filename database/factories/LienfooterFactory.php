<?php

namespace Database\Factories;

use App\Models\Lienfooter;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LienfooterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lienfooter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->text(255),
            'lien_page' => $this->faker->text(255),
            'descript' => $this->faker->text,
        ];
    }
}
