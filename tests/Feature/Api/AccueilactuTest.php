<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Accueilactu;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilactuTest extends TestCase
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
    public function it_gets_accueilactus_list()
    {
        $accueilactus = Accueilactu::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.accueilactus.index'));

        $response->assertOk()->assertSee($accueilactus[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_accueilactu()
    {
        $data = Accueilactu::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.accueilactus.store'), $data);

        $this->assertDatabaseHas('accueilactus', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_accueilactu()
    {
        $accueilactu = Accueilactu::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.accueilactus.update', $accueilactu),
            $data
        );

        $data['id'] = $accueilactu->id;

        $this->assertDatabaseHas('accueilactus', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilactu()
    {
        $accueilactu = Accueilactu::factory()->create();

        $response = $this->deleteJson(
            route('api.accueilactus.destroy', $accueilactu)
        );

        $this->assertDeleted($accueilactu);

        $response->assertNoContent();
    }
}
