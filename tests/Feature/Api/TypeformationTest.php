<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Typeformation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeformationTest extends TestCase
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
    public function it_gets_typeformations_list()
    {
        $typeformations = Typeformation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.typeformations.index'));

        $response->assertOk()->assertSee($typeformations[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_typeformation()
    {
        $data = Typeformation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.typeformations.store'), $data);

        $this->assertDatabaseHas('typeformations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_typeformation()
    {
        $typeformation = Typeformation::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'icone' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.typeformations.update', $typeformation),
            $data
        );

        $data['id'] = $typeformation->id;

        $this->assertDatabaseHas('typeformations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_typeformation()
    {
        $typeformation = Typeformation::factory()->create();

        $response = $this->deleteJson(
            route('api.typeformations.destroy', $typeformation)
        );

        $this->assertDeleted($typeformation);

        $response->assertNoContent();
    }
}
