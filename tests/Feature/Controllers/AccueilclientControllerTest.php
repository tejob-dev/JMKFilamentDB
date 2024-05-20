<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueilclient;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilclientControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueilclients()
    {
        $accueilclients = Accueilclient::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueilclients.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilclients.index')
            ->assertViewHas('accueilclients');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueilclient()
    {
        $response = $this->get(route('accueilclients.create'));

        $response->assertOk()->assertViewIs('app.accueilclients.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueilclient()
    {
        $data = Accueilclient::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueilclients.store'), $data);

        $this->assertDatabaseHas('accueilclients', $data);

        $accueilclient = Accueilclient::latest('id')->first();

        $response->assertRedirect(route('accueilclients.edit', $accueilclient));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueilclient()
    {
        $accueilclient = Accueilclient::factory()->create();

        $response = $this->get(route('accueilclients.show', $accueilclient));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilclients.show')
            ->assertViewHas('accueilclient');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueilclient()
    {
        $accueilclient = Accueilclient::factory()->create();

        $response = $this->get(route('accueilclients.edit', $accueilclient));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilclients.edit')
            ->assertViewHas('accueilclient');
    }

    /**
     * @test
     */
    public function it_updates_the_accueilclient()
    {
        $accueilclient = Accueilclient::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('accueilclients.update', $accueilclient),
            $data
        );

        $data['id'] = $accueilclient->id;

        $this->assertDatabaseHas('accueilclients', $data);

        $response->assertRedirect(route('accueilclients.edit', $accueilclient));
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilclient()
    {
        $accueilclient = Accueilclient::factory()->create();

        $response = $this->delete(
            route('accueilclients.destroy', $accueilclient)
        );

        $response->assertRedirect(route('accueilclients.index'));

        $this->assertDeleted($accueilclient);
    }
}
