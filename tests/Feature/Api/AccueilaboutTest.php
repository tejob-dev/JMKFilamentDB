<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilabout;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilaboutTest extends TestCase
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
    public function it_gets_accueilabouts_list()
    {
        $accueilabouts = Accueilabout::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueilabouts.index'));

        $response->assertOk()->assertSee($accueilabouts[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilabout()
    {
        $data = Accueilabout::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.accueilabouts.store'), $data);

        $this->assertDatabaseHas('accueilabouts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueilabout()
    {
        $accueilabout = Accueilabout::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'subservice' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
            'imagetextlist' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.accueilabouts.update', $accueilabout),
            $data
        );

        $data['id'] = $accueilabout->id;

        $this->assertDatabaseHas('accueilabouts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilabout()
    {
        $accueilabout = Accueilabout::factory()->create();

        $response = $this->deleteJson(
            route('api.accueilabouts.destroy', $accueilabout)
        );

        $this->assertDeleted($accueilabout);

        $response->assertNoContent();
    }
}
