<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Formation;
use App\Models\Typeformation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeformationFormationsTest extends TestCase
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
    public function it_gets_typeformation_formations()
    {
        $typeformation = Typeformation::factory()->create();
        $formations = Formation::factory()
            ->count(2)
            ->create([
                'typeformation_id' => $typeformation->id,
            ]);

        $response = $this->getJson(
            route('api.typeformations.formations.index', $typeformation)
        );

        $response->assertOk()->assertSee($formations[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_typeformation_formations()
    {
        $typeformation = Typeformation::factory()->create();
        $data = Formation::factory()
            ->make([
                'typeformation_id' => $typeformation->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.typeformations.formations.store', $typeformation),
            $data
        );

        $this->assertDatabaseHas('formations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $formation = Formation::latest('id')->first();

        $this->assertEquals($typeformation->id, $formation->typeformation_id);
    }
}
