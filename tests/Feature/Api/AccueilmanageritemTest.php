<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilmanageritem;

use App\Models\Accueilmanager;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilmanageritemTest extends TestCase
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
    public function it_gets_accueilmanageritems_list()
    {
        $accueilmanageritems = Accueilmanageritem::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueilmanageritems.index'));

        $response->assertOk()->assertSee($accueilmanageritems[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilmanageritem()
    {
        $data = Accueilmanageritem::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.accueilmanageritems.store'),
            $data
        );

        $this->assertDatabaseHas('accueilmanageritems', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueilmanageritem()
    {
        $accueilmanageritem = Accueilmanageritem::factory()->create();

        $accueilmanager = Accueilmanager::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'icone' => $this->faker->text(255),
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'accueilmanager_id' => $accueilmanager->id,
        ];

        $response = $this->putJson(
            route('api.accueilmanageritems.update', $accueilmanageritem),
            $data
        );

        $data['id'] = $accueilmanageritem->id;

        $this->assertDatabaseHas('accueilmanageritems', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilmanageritem()
    {
        $accueilmanageritem = Accueilmanageritem::factory()->create();

        $response = $this->deleteJson(
            route('api.accueilmanageritems.destroy', $accueilmanageritem)
        );

        $this->assertDeleted($accueilmanageritem);

        $response->assertNoContent();
    }
}
