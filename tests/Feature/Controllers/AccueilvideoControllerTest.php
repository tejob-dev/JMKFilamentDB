<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueilvideo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilvideoControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueilvideos()
    {
        $accueilvideos = Accueilvideo::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueilvideos.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilvideos.index')
            ->assertViewHas('accueilvideos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueilvideo()
    {
        $response = $this->get(route('accueilvideos.create'));

        $response->assertOk()->assertViewIs('app.accueilvideos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueilvideo()
    {
        $data = Accueilvideo::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueilvideos.store'), $data);

        $this->assertDatabaseHas('accueilvideos', $data);

        $accueilvideo = Accueilvideo::latest('id')->first();

        $response->assertRedirect(route('accueilvideos.edit', $accueilvideo));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueilvideo()
    {
        $accueilvideo = Accueilvideo::factory()->create();

        $response = $this->get(route('accueilvideos.show', $accueilvideo));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilvideos.show')
            ->assertViewHas('accueilvideo');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueilvideo()
    {
        $accueilvideo = Accueilvideo::factory()->create();

        $response = $this->get(route('accueilvideos.edit', $accueilvideo));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilvideos.edit')
            ->assertViewHas('accueilvideo');
    }

    /**
     * @test
     */
    public function it_updates_the_accueilvideo()
    {
        $accueilvideo = Accueilvideo::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'videolien' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('accueilvideos.update', $accueilvideo),
            $data
        );

        $data['id'] = $accueilvideo->id;

        $this->assertDatabaseHas('accueilvideos', $data);

        $response->assertRedirect(route('accueilvideos.edit', $accueilvideo));
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilvideo()
    {
        $accueilvideo = Accueilvideo::factory()->create();

        $response = $this->delete(
            route('accueilvideos.destroy', $accueilvideo)
        );

        $response->assertRedirect(route('accueilvideos.index'));

        $this->assertDeleted($accueilvideo);
    }
}
