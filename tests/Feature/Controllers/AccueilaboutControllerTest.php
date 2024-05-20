<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueilabout;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilaboutControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueilabouts()
    {
        $accueilabouts = Accueilabout::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueilabouts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilabouts.index')
            ->assertViewHas('accueilabouts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueilabout()
    {
        $response = $this->get(route('accueilabouts.create'));

        $response->assertOk()->assertViewIs('app.accueilabouts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueilabout()
    {
        $data = Accueilabout::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueilabouts.store'), $data);

        $this->assertDatabaseHas('accueilabouts', $data);

        $accueilabout = Accueilabout::latest('id')->first();

        $response->assertRedirect(route('accueilabouts.edit', $accueilabout));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueilabout()
    {
        $accueilabout = Accueilabout::factory()->create();

        $response = $this->get(route('accueilabouts.show', $accueilabout));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilabouts.show')
            ->assertViewHas('accueilabout');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueilabout()
    {
        $accueilabout = Accueilabout::factory()->create();

        $response = $this->get(route('accueilabouts.edit', $accueilabout));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilabouts.edit')
            ->assertViewHas('accueilabout');
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

        $response = $this->put(
            route('accueilabouts.update', $accueilabout),
            $data
        );

        $data['id'] = $accueilabout->id;

        $this->assertDatabaseHas('accueilabouts', $data);

        $response->assertRedirect(route('accueilabouts.edit', $accueilabout));
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilabout()
    {
        $accueilabout = Accueilabout::factory()->create();

        $response = $this->delete(
            route('accueilabouts.destroy', $accueilabout)
        );

        $response->assertRedirect(route('accueilabouts.index'));

        $this->assertDeleted($accueilabout);
    }
}
