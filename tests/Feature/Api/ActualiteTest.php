<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Actualite;

use App\Models\Accueilactu;
use App\Models\Typeformation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActualiteTest extends TestCase
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
    public function it_gets_actualites_list()
    {
        $actualites = Actualite::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.actualites.index'));

        $response->assertOk()->assertSee($actualites[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_actualite()
    {
        $data = Actualite::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.actualites.store'), $data);

        $this->assertDatabaseHas('actualites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_actualite()
    {
        $actualite = Actualite::factory()->create();

        $typeformation = Typeformation::factory()->create();
        $accueilactu = Accueilactu::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
            'dateactu' => $this->faker->dateTime,
            'managernom' => $this->faker->text(255),
            'typeformation_id' => $typeformation->id,
            'accueilactu_id' => $accueilactu->id,
        ];

        $response = $this->putJson(
            route('api.actualites.update', $actualite),
            $data
        );

        $data['id'] = $actualite->id;

        $this->assertDatabaseHas('actualites', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_actualite()
    {
        $actualite = Actualite::factory()->create();

        $response = $this->deleteJson(
            route('api.actualites.destroy', $actualite)
        );

        $this->assertDeleted($actualite);

        $response->assertNoContent();
    }
}
