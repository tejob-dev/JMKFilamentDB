<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilclient;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilclientTest extends TestCase
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
    public function it_gets_accueilclients_list()
    {
        $accueilclients = Accueilclient::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueilclients.index'));

        $response->assertOk()->assertSee($accueilclients[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilclient()
    {
        $data = Accueilclient::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.accueilclients.store'), $data);

        $this->assertDatabaseHas('accueilclients', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueilclient()
    {
        $accueilclient = Accueilclient::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.accueilclients.update', $accueilclient),
            $data
        );

        $data['id'] = $accueilclient->id;

        $this->assertDatabaseHas('accueilclients', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilclient()
    {
        $accueilclient = Accueilclient::factory()->create();

        $response = $this->deleteJson(
            route('api.accueilclients.destroy', $accueilclient)
        );

        $this->assertDeleted($accueilclient);

        $response->assertNoContent();
    }
}
