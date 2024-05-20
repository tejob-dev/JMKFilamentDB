<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Accueilclientitem;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccueilclientitemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accueilclientitem::class;

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
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'icone' => $this->faker->text(255),
            'accueilclient_id' => \App\Models\Accueilclient::factory(),
        ];
    }
}
