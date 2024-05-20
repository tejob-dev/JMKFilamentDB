<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Accueilmanager;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccueilmanagerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accueilmanager::class;

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
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
            'textentreprise' => $this->faker->text,
        ];
    }
}
