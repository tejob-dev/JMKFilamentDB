<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Equipe;
use App\Models\Accueiltemoin;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueiltemoinEquipesTest extends TestCase
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
    public function it_gets_accueiltemoin_equipes()
    {
        $accueiltemoin = Accueiltemoin::factory()->create();
        $equipes = Equipe::factory()
            ->count(2)
            ->create([
                'accueiltemoin_id' => $accueiltemoin->id,
            ]);

        $response = $this->getJson(
            route('api.accueiltemoins.equipes.index', $accueiltemoin)
        );

        $response->assertOk()->assertSee($equipes[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueiltemoin_equipes()
    {
        $accueiltemoin = Accueiltemoin::factory()->create();
        $data = Equipe::factory()
            ->make([
                'accueiltemoin_id' => $accueiltemoin->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.accueiltemoins.equipes.store', $accueiltemoin),
            $data
        );

        $this->assertDatabaseHas('equipes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $equipe = Equipe::latest('id')->first();

        $this->assertEquals($accueiltemoin->id, $equipe->accueiltemoin_id);
    }
}
