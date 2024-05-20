<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Accueilmanageritem;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccueilmanageritemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accueilmanageritem::class;

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
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'accueilmanager_id' => \App\Models\Accueilmanager::factory(),
        ];
    }
}
