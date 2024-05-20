<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueilmanager;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilmanagerControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueilmanagers()
    {
        $accueilmanagers = Accueilmanager::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueilmanagers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilmanagers.index')
            ->assertViewHas('accueilmanagers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueilmanager()
    {
        $response = $this->get(route('accueilmanagers.create'));

        $response->assertOk()->assertViewIs('app.accueilmanagers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueilmanager()
    {
        $data = Accueilmanager::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueilmanagers.store'), $data);

        $this->assertDatabaseHas('accueilmanagers', $data);

        $accueilmanager = Accueilmanager::latest('id')->first();

        $response->assertRedirect(
            route('accueilmanagers.edit', $accueilmanager)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueilmanager()
    {
        $accueilmanager = Accueilmanager::factory()->create();

        $response = $this->get(route('accueilmanagers.show', $accueilmanager));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilmanagers.show')
            ->assertViewHas('accueilmanager');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueilmanager()
    {
        $accueilmanager = Accueilmanager::factory()->create();

        $response = $this->get(route('accueilmanagers.edit', $accueilmanager));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilmanagers.edit')
            ->assertViewHas('accueilmanager');
    }

    /**
     * @test
     */
    public function it_updates_the_accueilmanager()
    {
        $accueilmanager = Accueilmanager::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
            'textentreprise' => $this->faker->text,
        ];

        $response = $this->put(
            route('accueilmanagers.update', $accueilmanager),
            $data
        );

        $data['id'] = $accueilmanager->id;

        $this->assertDatabaseHas('accueilmanagers', $data);

        $response->assertRedirect(
            route('accueilmanagers.edit', $accueilmanager)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilmanager()
    {
        $accueilmanager = Accueilmanager::factory()->create();

        $response = $this->delete(
            route('accueilmanagers.destroy', $accueilmanager)
        );

        $response->assertRedirect(route('accueilmanagers.index'));

        $this->assertDeleted($accueilmanager);
    }
}
