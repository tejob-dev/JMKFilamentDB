<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Formation;

use App\Models\Typeformation;
use App\Models\Accueilformation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationTest extends TestCase
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
    public function it_gets_formations_list()
    {
        $formations = Formation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.formations.index'));

        $response->assertOk()->assertSee($formations[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_formation()
    {
        $data = Formation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.formations.store'), $data);

        $this->assertDatabaseHas('formations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_formation()
    {
        $formation = Formation::factory()->create();

        $typeformation = Typeformation::factory()->create();
        $accueilformation = Accueilformation::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
            'typeformation_id' => $typeformation->id,
            'accueilformation_id' => $accueilformation->id,
        ];

        $response = $this->putJson(
            route('api.formations.update', $formation),
            $data
        );

        $data['id'] = $formation->id;

        $this->assertDatabaseHas('formations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_formation()
    {
        $formation = Formation::factory()->create();

        $response = $this->deleteJson(
            route('api.formations.destroy', $formation)
        );

        $this->assertDeleted($formation);

        $response->assertNoContent();
    }
}
