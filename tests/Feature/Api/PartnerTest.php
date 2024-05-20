<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Partner;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PartnerTest extends TestCase
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
    public function it_gets_partners_list()
    {
        $partners = Partner::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.partners.index'));

        $response->assertOk()->assertSee($partners[0]->imagetitle);
    }

    /**
     * @test
     */
    public function it_stores_the_partner()
    {
        $data = Partner::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.partners.store'), $data);

        $this->assertDatabaseHas('partners', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_partner()
    {
        $partner = Partner::factory()->create();

        $data = [
            'imagetitle' => $this->faker->text(255),
            'descript' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.partners.update', $partner),
            $data
        );

        $data['id'] = $partner->id;

        $this->assertDatabaseHas('partners', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_partner()
    {
        $partner = Partner::factory()->create();

        $response = $this->deleteJson(route('api.partners.destroy', $partner));

        $this->assertDeleted($partner);

        $response->assertNoContent();
    }
}
