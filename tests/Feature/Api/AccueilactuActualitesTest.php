<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Actualite;
use App\Models\Accueilactu;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilactuActualitesTest extends TestCase
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
    public function it_gets_accueilactu_actualites()
    {
        $accueilactu = Accueilactu::factory()->create();
        $actualites = Actualite::factory()
            ->count(2)
            ->create([
                'accueilactu_id' => $accueilactu->id,
            ]);

        $response = $this->getJson(
            route('api.accueilactus.actualites.index', $accueilactu)
        );

        $response->assertOk()->assertSee($actualites[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilactu_actualites()
    {
        $accueilactu = Accueilactu::factory()->create();
        $data = Actualite::factory()
            ->make([
                'accueilactu_id' => $accueilactu->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.accueilactus.actualites.store', $accueilactu),
            $data
        );

        $this->assertDatabaseHas('actualites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $actualite = Actualite::latest('id')->first();

        $this->assertEquals($accueilactu->id, $actualite->accueilactu_id);
    }
}
