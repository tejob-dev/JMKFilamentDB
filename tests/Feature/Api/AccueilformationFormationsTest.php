<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Formation;
use App\Models\Accueilformation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilformationFormationsTest extends TestCase
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
    public function it_gets_accueilformation_formations()
    {
        $accueilformation = Accueilformation::factory()->create();
        $formations = Formation::factory()
            ->count(2)
            ->create([
                'accueilformation_id' => $accueilformation->id,
            ]);

        $response = $this->getJson(
            route('api.accueilformations.formations.index', $accueilformation)
        );

        $response->assertOk()->assertSee($formations[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilformation_formations()
    {
        $accueilformation = Accueilformation::factory()->create();
        $data = Formation::factory()
            ->make([
                'accueilformation_id' => $accueilformation->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.accueilformations.formations.store', $accueilformation),
            $data
        );

        $this->assertDatabaseHas('formations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $formation = Formation::latest('id')->first();

        $this->assertEquals(
            $accueilformation->id,
            $formation->accueilformation_id
        );
    }
}
