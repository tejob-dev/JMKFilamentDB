<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilserviceitem;

use App\Models\Accueilservice;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilserviceitemTest extends TestCase
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
    public function it_gets_accueilserviceitems_list()
    {
        $accueilserviceitems = Accueilserviceitem::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueilserviceitems.index'));

        $response->assertOk()->assertSee($accueilserviceitems[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilserviceitem()
    {
        $data = Accueilserviceitem::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.accueilserviceitems.store'),
            $data
        );

        $this->assertDatabaseHas('accueilserviceitems', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueilserviceitem()
    {
        $accueilserviceitem = Accueilserviceitem::factory()->create();

        $accueilservice = Accueilservice::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'subservice' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'accueilservice_id' => $accueilservice->id,
        ];

        $response = $this->putJson(
            route('api.accueilserviceitems.update', $accueilserviceitem),
            $data
        );

        $data['id'] = $accueilserviceitem->id;

        $this->assertDatabaseHas('accueilserviceitems', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilserviceitem()
    {
        $accueilserviceitem = Accueilserviceitem::factory()->create();

        $response = $this->deleteJson(
            route('api.accueilserviceitems.destroy', $accueilserviceitem)
        );

        $this->assertDeleted($accueilserviceitem);

        $response->assertNoContent();
    }
}
