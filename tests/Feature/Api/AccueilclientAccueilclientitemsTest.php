<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilclient;
use App\Models\Accueilclientitem;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilclientAccueilclientitemsTest extends TestCase
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
    public function it_gets_accueilclient_accueilclientitems()
    {
        $accueilclient = Accueilclient::factory()->create();
        $accueilclientitems = Accueilclientitem::factory()
            ->count(2)
            ->create([
                'accueilclient_id' => $accueilclient->id,
            ]);

        $response = $this->getJson(
            route('api.accueilclients.accueilclientitems.index', $accueilclient)
        );

        $response->assertOk()->assertSee($accueilclientitems[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilclient_accueilclientitems()
    {
        $accueilclient = Accueilclient::factory()->create();
        $data = Accueilclientitem::factory()
            ->make([
                'accueilclient_id' => $accueilclient->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.accueilclients.accueilclientitems.store',
                $accueilclient
            ),
            $data
        );

        $this->assertDatabaseHas('accueilclientitems', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $accueilclientitem = Accueilclientitem::latest('id')->first();

        $this->assertEquals(
            $accueilclient->id,
            $accueilclientitem->accueilclient_id
        );
    }
}
