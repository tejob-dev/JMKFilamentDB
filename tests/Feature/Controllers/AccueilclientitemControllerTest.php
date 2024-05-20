<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueilclientitem;

use App\Models\Accueilclient;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilclientitemControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueilclientitems()
    {
        $accueilclientitems = Accueilclientitem::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueilclientitems.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilclientitems.index')
            ->assertViewHas('accueilclientitems');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueilclientitem()
    {
        $response = $this->get(route('accueilclientitems.create'));

        $response->assertOk()->assertViewIs('app.accueilclientitems.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueilclientitem()
    {
        $data = Accueilclientitem::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueilclientitems.store'), $data);

        $this->assertDatabaseHas('accueilclientitems', $data);

        $accueilclientitem = Accueilclientitem::latest('id')->first();

        $response->assertRedirect(
            route('accueilclientitems.edit', $accueilclientitem)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueilclientitem()
    {
        $accueilclientitem = Accueilclientitem::factory()->create();

        $response = $this->get(
            route('accueilclientitems.show', $accueilclientitem)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.accueilclientitems.show')
            ->assertViewHas('accueilclientitem');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueilclientitem()
    {
        $accueilclientitem = Accueilclientitem::factory()->create();

        $response = $this->get(
            route('accueilclientitems.edit', $accueilclientitem)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.accueilclientitems.edit')
            ->assertViewHas('accueilclientitem');
    }

    /**
     * @test
     */
    public function it_updates_the_accueilclientitem()
    {
        $accueilclientitem = Accueilclientitem::factory()->create();

        $accueilclient = Accueilclient::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'icone' => $this->faker->text(255),
            'accueilclient_id' => $accueilclient->id,
        ];

        $response = $this->put(
            route('accueilclientitems.update', $accueilclientitem),
            $data
        );

        $data['id'] = $accueilclientitem->id;

        $this->assertDatabaseHas('accueilclientitems', $data);

        $response->assertRedirect(
            route('accueilclientitems.edit', $accueilclientitem)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilclientitem()
    {
        $accueilclientitem = Accueilclientitem::factory()->create();

        $response = $this->delete(
            route('accueilclientitems.destroy', $accueilclientitem)
        );

        $response->assertRedirect(route('accueilclientitems.index'));

        $this->assertDeleted($accueilclientitem);
    }
}
