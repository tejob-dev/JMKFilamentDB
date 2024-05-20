<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueilformation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilformationControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueilformations()
    {
        $accueilformations = Accueilformation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueilformations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilformations.index')
            ->assertViewHas('accueilformations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueilformation()
    {
        $response = $this->get(route('accueilformations.create'));

        $response->assertOk()->assertViewIs('app.accueilformations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueilformation()
    {
        $data = Accueilformation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueilformations.store'), $data);

        $this->assertDatabaseHas('accueilformations', $data);

        $accueilformation = Accueilformation::latest('id')->first();

        $response->assertRedirect(
            route('accueilformations.edit', $accueilformation)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueilformation()
    {
        $accueilformation = Accueilformation::factory()->create();

        $response = $this->get(
            route('accueilformations.show', $accueilformation)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.accueilformations.show')
            ->assertViewHas('accueilformation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueilformation()
    {
        $accueilformation = Accueilformation::factory()->create();

        $response = $this->get(
            route('accueilformations.edit', $accueilformation)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.accueilformations.edit')
            ->assertViewHas('accueilformation');
    }

    /**
     * @test
     */
    public function it_updates_the_accueilformation()
    {
        $accueilformation = Accueilformation::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('accueilformations.update', $accueilformation),
            $data
        );

        $data['id'] = $accueilformation->id;

        $this->assertDatabaseHas('accueilformations', $data);

        $response->assertRedirect(
            route('accueilformations.edit', $accueilformation)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilformation()
    {
        $accueilformation = Accueilformation::factory()->create();

        $response = $this->delete(
            route('accueilformations.destroy', $accueilformation)
        );

        $response->assertRedirect(route('accueilformations.index'));

        $this->assertDeleted($accueilformation);
    }
}
