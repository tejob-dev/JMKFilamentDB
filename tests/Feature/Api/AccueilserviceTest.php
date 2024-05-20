<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilservice;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilserviceTest extends TestCase
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
    public function it_gets_accueilservices_list()
    {
        $accueilservices = Accueilservice::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueilservices.index'));

        $response->assertOk()->assertSee($accueilservices[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilservice()
    {
        $data = Accueilservice::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.accueilservices.store'), $data);

        $this->assertDatabaseHas('accueilservices', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueilservice()
    {
        $accueilservice = Accueilservice::factory()->create();

        $data = [
            'secton' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.accueilservices.update', $accueilservice),
            $data
        );

        $data['id'] = $accueilservice->id;

        $this->assertDatabaseHas('accueilservices', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilservice()
    {
        $accueilservice = Accueilservice::factory()->create();

        $response = $this->deleteJson(
            route('api.accueilservices.destroy', $accueilservice)
        );

        $this->assertDeleted($accueilservice);

        $response->assertNoContent();
    }
}
