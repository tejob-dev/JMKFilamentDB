<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Lienfooter;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LienfooterTest extends TestCase
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
    public function it_gets_lienfooters_list()
    {
        $lienfooters = Lienfooter::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.lienfooters.index'));

        $response->assertOk()->assertSee($lienfooters[0]->titre);
    }

    /**
     * @test
     */
    public function it_stores_the_lienfooter()
    {
        $data = Lienfooter::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.lienfooters.store'), $data);

        $this->assertDatabaseHas('lienfooters', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_lienfooter()
    {
        $lienfooter = Lienfooter::factory()->create();

        $data = [
            'titre' => $this->faker->text(255),
            'lien_page' => $this->faker->text(255),
            'descript' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.lienfooters.update', $lienfooter),
            $data
        );

        $data['id'] = $lienfooter->id;

        $this->assertDatabaseHas('lienfooters', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_lienfooter()
    {
        $lienfooter = Lienfooter::factory()->create();

        $response = $this->deleteJson(
            route('api.lienfooters.destroy', $lienfooter)
        );

        $this->assertDeleted($lienfooter);

        $response->assertNoContent();
    }
}
