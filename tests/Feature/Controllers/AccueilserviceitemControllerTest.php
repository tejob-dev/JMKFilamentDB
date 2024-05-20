<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueilserviceitem;

use App\Models\Accueilservice;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilserviceitemControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueilserviceitems()
    {
        $accueilserviceitems = Accueilserviceitem::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueilserviceitems.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilserviceitems.index')
            ->assertViewHas('accueilserviceitems');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueilserviceitem()
    {
        $response = $this->get(route('accueilserviceitems.create'));

        $response->assertOk()->assertViewIs('app.accueilserviceitems.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueilserviceitem()
    {
        $data = Accueilserviceitem::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueilserviceitems.store'), $data);

        $this->assertDatabaseHas('accueilserviceitems', $data);

        $accueilserviceitem = Accueilserviceitem::latest('id')->first();

        $response->assertRedirect(
            route('accueilserviceitems.edit', $accueilserviceitem)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueilserviceitem()
    {
        $accueilserviceitem = Accueilserviceitem::factory()->create();

        $response = $this->get(
            route('accueilserviceitems.show', $accueilserviceitem)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.accueilserviceitems.show')
            ->assertViewHas('accueilserviceitem');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueilserviceitem()
    {
        $accueilserviceitem = Accueilserviceitem::factory()->create();

        $response = $this->get(
            route('accueilserviceitems.edit', $accueilserviceitem)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.accueilserviceitems.edit')
            ->assertViewHas('accueilserviceitem');
    }

    /**
     * @test
     */
    public function it_updates_the_accueilserviceitem()
    {
        $accueilserviceitem = Accueilserviceitem::factory()->create();

        $accueilservice = Accueilservice::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'subservice' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'accueilservice_id' => $accueilservice->id,
        ];

        $response = $this->put(
            route('accueilserviceitems.update', $accueilserviceitem),
            $data
        );

        $data['id'] = $accueilserviceitem->id;

        $this->assertDatabaseHas('accueilserviceitems', $data);

        $response->assertRedirect(
            route('accueilserviceitems.edit', $accueilserviceitem)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilserviceitem()
    {
        $accueilserviceitem = Accueilserviceitem::factory()->create();

        $response = $this->delete(
            route('accueilserviceitems.destroy', $accueilserviceitem)
        );

        $response->assertRedirect(route('accueilserviceitems.index'));

        $this->assertDeleted($accueilserviceitem);
    }
}
