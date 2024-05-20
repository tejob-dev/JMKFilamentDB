<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Accueilservice;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccueilserviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accueilservice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'secton' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];
    }
}
