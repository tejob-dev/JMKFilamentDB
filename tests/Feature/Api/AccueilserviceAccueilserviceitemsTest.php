<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilservice;
use App\Models\Accueilserviceitem;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilserviceAccueilserviceitemsTest extends TestCase
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
    public function it_gets_accueilservice_accueilserviceitems()
    {
        $accueilservice = Accueilservice::factory()->create();
        $accueilserviceitems = Accueilserviceitem::factory()
            ->count(2)
            ->create([
                'accueilservice_id' => $accueilservice->id,
            ]);

        $response = $this->getJson(
            route(
                'api.accueilservices.accueilserviceitems.index',
                $accueilservice
            )
        );

        $response->assertOk()->assertSee($accueilserviceitems[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilservice_accueilserviceitems()
    {
        $accueilservice = Accueilservice::factory()->create();
        $data = Accueilserviceitem::factory()
            ->make([
                'accueilservice_id' => $accueilservice->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.accueilservices.accueilserviceitems.store',
                $accueilservice
            ),
            $data
        );

        $this->assertDatabaseHas('accueilserviceitems', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $accueilserviceitem = Accueilserviceitem::latest('id')->first();

        $this->assertEquals(
            $accueilservice->id,
            $accueilserviceitem->accueilservice_id
        );
    }
}
