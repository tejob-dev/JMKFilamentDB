<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilformation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilformationTest extends TestCase
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
    public function it_gets_accueilformations_list()
    {
        $accueilformations = Accueilformation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueilformations.index'));

        $response->assertOk()->assertSee($accueilformations[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilformation()
    {
        $data = Accueilformation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.accueilformations.store'),
            $data
        );

        $this->assertDatabaseHas('accueilformations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueilformation()
    {
        $accueilformation = Accueilformation::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.accueilformations.update', $accueilformation),
            $data
        );

        $data['id'] = $accueilformation->id;

        $this->assertDatabaseHas('accueilformations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilformation()
    {
        $accueilformation = Accueilformation::factory()->create();

        $response = $this->deleteJson(
            route('api.accueilformations.destroy', $accueilformation)
        );

        $this->assertDeleted($accueilformation);

        $response->assertNoContent();
    }
}
