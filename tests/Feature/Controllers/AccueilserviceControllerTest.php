<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueilservice;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilserviceControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueilservices()
    {
        $accueilservices = Accueilservice::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueilservices.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilservices.index')
            ->assertViewHas('accueilservices');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueilservice()
    {
        $response = $this->get(route('accueilservices.create'));

        $response->assertOk()->assertViewIs('app.accueilservices.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueilservice()
    {
        $data = Accueilservice::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueilservices.store'), $data);

        $this->assertDatabaseHas('accueilservices', $data);

        $accueilservice = Accueilservice::latest('id')->first();

        $response->assertRedirect(
            route('accueilservices.edit', $accueilservice)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueilservice()
    {
        $accueilservice = Accueilservice::factory()->create();

        $response = $this->get(route('accueilservices.show', $accueilservice));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilservices.show')
            ->assertViewHas('accueilservice');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueilservice()
    {
        $accueilservice = Accueilservice::factory()->create();

        $response = $this->get(route('accueilservices.edit', $accueilservice));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilservices.edit')
            ->assertViewHas('accueilservice');
    }

    /**
     * @test
     */
    public function it_updates_the_accueilservice()
    {
        $accueilservice = Accueilservice::factory()->create();

        $data = [
            'secton' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('accueilservices.update', $accueilservice),
            $data
        );

        $data['id'] = $accueilservice->id;

        $this->assertDatabaseHas('accueilservices', $data);

        $response->assertRedirect(
            route('accueilservices.edit', $accueilservice)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilservice()
    {
        $accueilservice = Accueilservice::factory()->create();

        $response = $this->delete(
            route('accueilservices.destroy', $accueilservice)
        );

        $response->assertRedirect(route('accueilservices.index'));

        $this->assertDeleted($accueilservice);
    }
}
