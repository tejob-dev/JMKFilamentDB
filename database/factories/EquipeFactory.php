<?php

namespace Database\Factories;

use App\Models\Equipe;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipe::class;

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
            'nom_prenom' => $this->faker->text(255),
            'fonction' => $this->faker->text(255),
            'accueiltemoin_id' => \App\Models\Accueiltemoin::factory(),
        ];
    }
}
