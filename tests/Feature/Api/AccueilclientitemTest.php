<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilclientitem;

use App\Models\Accueilclient;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilclientitemTest extends TestCase
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
    public function it_gets_accueilclientitems_list()
    {
        $accueilclientitems = Accueilclientitem::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueilclientitems.index'));

        $response->assertOk()->assertSee($accueilclientitems[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilclientitem()
    {
        $data = Accueilclientitem::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.accueilclientitems.store'),
            $data
        );

        $this->assertDatabaseHas('accueilclientitems', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueilclientitem()
    {
        $accueilclientitem = Accueilclientitem::factory()->create();

        $accueilclient = Accueilclient::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'icone' => $this->faker->text(255),
            'accueilclient_id' => $accueilclient->id,
        ];

        $response = $this->putJson(
            route('api.accueilclientitems.update', $accueilclientitem),
            $data
        );

        $data['id'] = $accueilclientitem->id;

        $this->assertDatabaseHas('accueilclientitems', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilclientitem()
    {
        $accueilclientitem = Accueilclientitem::factory()->create();

        $response = $this->deleteJson(
            route('api.accueilclientitems.destroy', $accueilclientitem)
        );

        $this->assertDeleted($accueilclientitem);

        $response->assertNoContent();
    }
}
