<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueilmanageritem;

use App\Models\Accueilmanager;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilmanageritemControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueilmanageritems()
    {
        $accueilmanageritems = Accueilmanageritem::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueilmanageritems.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilmanageritems.index')
            ->assertViewHas('accueilmanageritems');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueilmanageritem()
    {
        $response = $this->get(route('accueilmanageritems.create'));

        $response->assertOk()->assertViewIs('app.accueilmanageritems.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueilmanageritem()
    {
        $data = Accueilmanageritem::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueilmanageritems.store'), $data);

        $this->assertDatabaseHas('accueilmanageritems', $data);

        $accueilmanageritem = Accueilmanageritem::latest('id')->first();

        $response->assertRedirect(
            route('accueilmanageritems.edit', $accueilmanageritem)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueilmanageritem()
    {
        $accueilmanageritem = Accueilmanageritem::factory()->create();

        $response = $this->get(
            route('accueilmanageritems.show', $accueilmanageritem)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.accueilmanageritems.show')
            ->assertViewHas('accueilmanageritem');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueilmanageritem()
    {
        $accueilmanageritem = Accueilmanageritem::factory()->create();

        $response = $this->get(
            route('accueilmanageritems.edit', $accueilmanageritem)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.accueilmanageritems.edit')
            ->assertViewHas('accueilmanageritem');
    }

    /**
     * @test
     */
    public function it_updates_the_accueilmanageritem()
    {
        $accueilmanageritem = Accueilmanageritem::factory()->create();

        $accueilmanager = Accueilmanager::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'icone' => $this->faker->text(255),
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'accueilmanager_id' => $accueilmanager->id,
        ];

        $response = $this->put(
            route('accueilmanageritems.update', $accueilmanageritem),
            $data
        );

        $data['id'] = $accueilmanageritem->id;

        $this->assertDatabaseHas('accueilmanageritems', $data);

        $response->assertRedirect(
            route('accueilmanageritems.edit', $accueilmanageritem)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilmanageritem()
    {
        $accueilmanageritem = Accueilmanageritem::factory()->create();

        $response = $this->delete(
            route('accueilmanageritems.destroy', $accueilmanageritem)
        );

        $response->assertRedirect(route('accueilmanageritems.index'));

        $this->assertDeleted($accueilmanageritem);
    }
}
