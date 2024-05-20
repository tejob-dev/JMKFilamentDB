<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Accueilserviceitem;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccueilserviceitemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accueilserviceitem::class;

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
            'subservice' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'accueilservice_id' => \App\Models\Accueilservice::factory(),
        ];
    }
}
