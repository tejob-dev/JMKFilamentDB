<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Actualite;
use App\Models\Typeformation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeformationActualitesTest extends TestCase
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
    public function it_gets_typeformation_actualites()
    {
        $typeformation = Typeformation::factory()->create();
        $actualites = Actualite::factory()
            ->count(2)
            ->create([
                'typeformation_id' => $typeformation->id,
            ]);

        $response = $this->getJson(
            route('api.typeformations.actualites.index', $typeformation)
        );

        $response->assertOk()->assertSee($actualites[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_typeformation_actualites()
    {
        $typeformation = Typeformation::factory()->create();
        $data = Actualite::factory()
            ->make([
                'typeformation_id' => $typeformation->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.typeformations.actualites.store', $typeformation),
            $data
        );

        $this->assertDatabaseHas('actualites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $actualite = Actualite::latest('id')->first();

        $this->assertEquals($typeformation->id, $actualite->typeformation_id);
    }
}
