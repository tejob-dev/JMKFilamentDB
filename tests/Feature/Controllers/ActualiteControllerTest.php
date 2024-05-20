<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Actualite;

use App\Models\Accueilactu;
use App\Models\Typeformation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActualiteControllerTest extends TestCase
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
    public function it_displays_index_view_with_actualites()
    {
        $actualites = Actualite::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('actualites.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.actualites.index')
            ->assertViewHas('actualites');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_actualite()
    {
        $response = $this->get(route('actualites.create'));

        $response->assertOk()->assertViewIs('app.actualites.create');
    }

    /**
     * @test
     */
    public function it_stores_the_actualite()
    {
        $data = Actualite::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('actualites.store'), $data);

        $this->assertDatabaseHas('actualites', $data);

        $actualite = Actualite::latest('id')->first();

        $response->assertRedirect(route('actualites.edit', $actualite));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_actualite()
    {
        $actualite = Actualite::factory()->create();

        $response = $this->get(route('actualites.show', $actualite));

        $response
            ->assertOk()
            ->assertViewIs('app.actualites.show')
            ->assertViewHas('actualite');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_actualite()
    {
        $actualite = Actualite::factory()->create();

        $response = $this->get(route('actualites.edit', $actualite));

        $response
            ->assertOk()
            ->assertViewIs('app.actualites.edit')
            ->assertViewHas('actualite');
    }

    /**
     * @test
     */
    public function it_updates_the_actualite()
    {
        $actualite = Actualite::factory()->create();

        $typeformation = Typeformation::factory()->create();
        $accueilactu = Accueilactu::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
            'dateactu' => $this->faker->dateTime,
            'managernom' => $this->faker->text(255),
            'typeformation_id' => $typeformation->id,
            'accueilactu_id' => $accueilactu->id,
        ];

        $response = $this->put(route('actualites.update', $actualite), $data);

        $data['id'] = $actualite->id;

        $this->assertDatabaseHas('actualites', $data);

        $response->assertRedirect(route('actualites.edit', $actualite));
    }

    /**
     * @test
     */
    public function it_deletes_the_actualite()
    {
        $actualite = Actualite::factory()->create();

        $response = $this->delete(route('actualites.destroy', $actualite));

        $response->assertRedirect(route('actualites.index'));

        $this->assertDeleted($actualite);
    }
}
