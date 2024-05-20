<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilvideo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilvideoTest extends TestCase
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
    public function it_gets_accueilvideos_list()
    {
        $accueilvideos = Accueilvideo::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueilvideos.index'));

        $response->assertOk()->assertSee($accueilvideos[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilvideo()
    {
        $data = Accueilvideo::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.accueilvideos.store'), $data);

        $this->assertDatabaseHas('accueilvideos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueilvideo()
    {
        $accueilvideo = Accueilvideo::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'videolien' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.accueilvideos.update', $accueilvideo),
            $data
        );

        $data['id'] = $accueilvideo->id;

        $this->assertDatabaseHas('accueilvideos', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilvideo()
    {
        $accueilvideo = Accueilvideo::factory()->create();

        $response = $this->deleteJson(
            route('api.accueilvideos.destroy', $accueilvideo)
        );

        $this->assertDeleted($accueilvideo);

        $response->assertNoContent();
    }
}
