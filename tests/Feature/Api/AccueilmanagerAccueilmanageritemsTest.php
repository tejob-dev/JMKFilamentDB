<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilmanager;
use App\Models\Accueilmanageritem;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilmanagerAccueilmanageritemsTest extends TestCase
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
    public function it_gets_accueilmanager_accueilmanageritems()
    {
        $accueilmanager = Accueilmanager::factory()->create();
        $accueilmanageritems = Accueilmanageritem::factory()
            ->count(2)
            ->create([
                'accueilmanager_id' => $accueilmanager->id,
            ]);

        $response = $this->getJson(
            route(
                'api.accueilmanagers.accueilmanageritems.index',
                $accueilmanager
            )
        );

        $response->assertOk()->assertSee($accueilmanageritems[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilmanager_accueilmanageritems()
    {
        $accueilmanager = Accueilmanager::factory()->create();
        $data = Accueilmanageritem::factory()
            ->make([
                'accueilmanager_id' => $accueilmanager->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.accueilmanagers.accueilmanageritems.store',
                $accueilmanager
            ),
            $data
        );

        $this->assertDatabaseHas('accueilmanageritems', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $accueilmanageritem = Accueilmanageritem::latest('id')->first();

        $this->assertEquals(
            $accueilmanager->id,
            $accueilmanageritem->accueilmanager_id
        );
    }
}
