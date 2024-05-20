<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueilactu;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilactuControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueilactus()
    {
        $accueilactus = Accueilactu::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueilactus.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilactus.index')
            ->assertViewHas('accueilactus');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueilactu()
    {
        $response = $this->get(route('accueilactus.create'));

        $response->assertOk()->assertViewIs('app.accueilactus.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueilactu()
    {
        $data = Accueilactu::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueilactus.store'), $data);

        $this->assertDatabaseHas('accueilactus', $data);

        $accueilactu = Accueilactu::latest('id')->first();

        $response->assertRedirect(route('accueilactus.edit', $accueilactu));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueilactu()
    {
        $accueilactu = Accueilactu::factory()->create();

        $response = $this->get(route('accueilactus.show', $accueilactu));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilactus.show')
            ->assertViewHas('accueilactu');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueilactu()
    {
        $accueilactu = Accueilactu::factory()->create();

        $response = $this->get(route('accueilactus.edit', $accueilactu));

        $response
            ->assertOk()
            ->assertViewIs('app.accueilactus.edit')
            ->assertViewHas('accueilactu');
    }

    /**
     * @test
     */
    public function it_updates_the_accueilactu()
    {
        $accueilactu = Accueilactu::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('accueilactus.update', $accueilactu),
            $data
        );

        $data['id'] = $accueilactu->id;

        $this->assertDatabaseHas('accueilactus', $data);

        $response->assertRedirect(route('accueilactus.edit', $accueilactu));
    }

    /**
     * @test
     */
    public function it_deletes_the_accueilactu()
    {
        $accueilactu = Accueilactu::factory()->create();

        $response = $this->delete(route('accueilactus.destroy', $accueilactu));

        $response->assertRedirect(route('accueilactus.index'));

        $this->assertDeleted($accueilactu);
    }
}
