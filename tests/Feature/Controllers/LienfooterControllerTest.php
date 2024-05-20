<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Lienfooter;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LienfooterControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_lienfooters()
    {
        $lienfooters = Lienfooter::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('lienfooters.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.lienfooters.index')
            ->assertViewHas('lienfooters');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_lienfooter()
    {
        $response = $this->get(route('lienfooters.create'));

        $response->assertOk()->assertViewIs('app.lienfooters.create');
    }

    /**
     * @test
     */
    public function it_stores_the_lienfooter()
    {
        $data = Lienfooter::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('lienfooters.store'), $data);

        $this->assertDatabaseHas('lienfooters', $data);

        $lienfooter = Lienfooter::latest('id')->first();

        $response->assertRedirect(route('lienfooters.edit', $lienfooter));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_lienfooter()
    {
        $lienfooter = Lienfooter::factory()->create();

        $response = $this->get(route('lienfooters.show', $lienfooter));

        $response
            ->assertOk()
            ->assertViewIs('app.lienfooters.show')
            ->assertViewHas('lienfooter');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_lienfooter()
    {
        $lienfooter = Lienfooter::factory()->create();

        $response = $this->get(route('lienfooters.edit', $lienfooter));

        $response
            ->assertOk()
            ->assertViewIs('app.lienfooters.edit')
            ->assertViewHas('lienfooter');
    }

    /**
     * @test
     */
    public function it_updates_the_lienfooter()
    {
        $lienfooter = Lienfooter::factory()->create();

        $data = [
            'titre' => $this->faker->text(255),
            'lien_page' => $this->faker->text(255),
            'descript' => $this->faker->text,
        ];

        $response = $this->put(route('lienfooters.update', $lienfooter), $data);

        $data['id'] = $lienfooter->id;

        $this->assertDatabaseHas('lienfooters', $data);

        $response->assertRedirect(route('lienfooters.edit', $lienfooter));
    }

    /**
     * @test
     */
    public function it_deletes_the_lienfooter()
    {
        $lienfooter = Lienfooter::factory()->create();

        $response = $this->delete(route('lienfooters.destroy', $lienfooter));

        $response->assertRedirect(route('lienfooters.index'));

        $this->assertDeleted($lienfooter);
    }
}
