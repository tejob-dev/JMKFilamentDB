<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilmanager;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilmanagerTest extends TestCase
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
    public function it_gets_accueilmanagers_list()
    {
        $accueilmanagers = Accueilmanager::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueilmanagers.index'));

        $response->assertOk()->assertSee($accueilmanagers[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilmanager()
    {
        $data = Accueilmanager::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.accueilmanagers.store'), $data);

        $this->assertDatabaseHas('accueilmanagers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueilmanager()
    {
        $accueilmanager = Accueilmanager::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
            'textentreprise' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.accueilmanagers.update', $accueilmanager),
            $data
        );

        $data['id'] = $accueilmanager->id;

        $this->assertDatabaseHas('accueilmanagers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilmanager()
    {
        $accueilmanager = Accueilmanager::factory()->create();

        $response = $this->deleteJson(
            route('api.accueilmanagers.destroy', $accueilmanager)
        );

        $this->assertDeleted($accueilmanager);

        $response->assertNoContent();
    }
}
