<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueiltemoin;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueiltemoinTest extends TestCase
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
    public function it_gets_accueiltemoins_list()
    {
        $accueiltemoins = Accueiltemoin::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueiltemoins.index'));

        $response->assertOk()->assertSee($accueiltemoins[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueiltemoin()
    {
        $data = Accueiltemoin::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.accueiltemoins.store'), $data);

        $this->assertDatabaseHas('accueiltemoins', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueiltemoin()
    {
        $accueiltemoin = Accueiltemoin::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.accueiltemoins.update', $accueiltemoin),
            $data
        );

        $data['id'] = $accueiltemoin->id;

        $this->assertDatabaseHas('accueiltemoins', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueiltemoin()
    {
        $accueiltemoin = Accueiltemoin::factory()->create();

        $response = $this->deleteJson(
            route('api.accueiltemoins.destroy', $accueiltemoin)
        );

        $this->assertDeleted($accueiltemoin);

        $response->assertNoContent();
    }
}
