<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Equipe;

use App\Models\Accueiltemoin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EquipeControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_equipes()
    {
        $equipes = Equipe::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('equipes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.equipes.index')
            ->assertViewHas('equipes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_equipe()
    {
        $response = $this->get(route('equipes.create'));

        $response->assertOk()->assertViewIs('app.equipes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_equipe()
    {
        $data = Equipe::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('equipes.store'), $data);

        $this->assertDatabaseHas('equipes', $data);

        $equipe = Equipe::latest('id')->first();

        $response->assertRedirect(route('equipes.edit', $equipe));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_equipe()
    {
        $equipe = Equipe::factory()->create();

        $response = $this->get(route('equipes.show', $equipe));

        $response
            ->assertOk()
            ->assertViewIs('app.equipes.show')
            ->assertViewHas('equipe');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_equipe()
    {
        $equipe = Equipe::factory()->create();

        $response = $this->get(route('equipes.edit', $equipe));

        $response
            ->assertOk()
            ->assertViewIs('app.equipes.edit')
            ->assertViewHas('equipe');
    }

    /**
     * @test
     */
    public function it_updates_the_equipe()
    {
        $equipe = Equipe::factory()->create();

        $accueiltemoin = Accueiltemoin::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
            'nom_prenom' => $this->faker->text(255),
            'fonction' => $this->faker->text(255),
            'accueiltemoin_id' => $accueiltemoin->id,
        ];

        $response = $this->put(route('equipes.update', $equipe), $data);

        $data['id'] = $equipe->id;

        $this->assertDatabaseHas('equipes', $data);

        $response->assertRedirect(route('equipes.edit', $equipe));
    }

    /**
     * @test
     */
    public function it_deletes_the_equipe()
    {
        $equipe = Equipe::factory()->create();

        $response = $this->delete(route('equipes.destroy', $equipe));

        $response->assertRedirect(route('equipes.index'));

        $this->assertDeleted($equipe);
    }
}
