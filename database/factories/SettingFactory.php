<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_site' => $this->faker->text(255),
            'logo_site' => $this->faker->text(255),
            'contact_site' => $this->faker->text(255),
            'email_site' => $this->faker->text(255),
            'defaut_lang' => $this->faker->text(255),
            'position_site' => $this->faker->text(255),
            'list_social' => $this->faker->text(255),
            'lien_contact' => $this->faker->text(255),
        ];
    }
}
