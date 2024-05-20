<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Equipe;

use App\Models\Accueiltemoin;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EquipeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_equipes_list()
    {
        $equipes = Equipe::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.equipes.index'));

        $response->assertOk()->assertSee($equipes[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_equipe()
    {
        $data = Equipe::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.equipes.store'), $data);

        $this->assertDatabaseHas('equipes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.equipes.update', $equipe), $data);

        $data['id'] = $equipe->id;

        $this->assertDatabaseHas('equipes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_equipe()
    {
        $equipe = Equipe::factory()->create();

        $response = $this->deleteJson(route('api.equipes.destroy', $equipe));

        $this->assertDeleted($equipe);

        $response->assertNoContent();
    }
}
