<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Accueiltemoin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueiltemoinControllerTest extends TestCase
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
    public function it_displays_index_view_with_accueiltemoins()
    {
        $accueiltemoins = Accueiltemoin::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accueiltemoins.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accueiltemoins.index')
            ->assertViewHas('accueiltemoins');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_accueiltemoin()
    {
        $response = $this->get(route('accueiltemoins.create'));

        $response->assertOk()->assertViewIs('app.accueiltemoins.create');
    }

    /**
     * @test
     */
    public function it_stores_the_accueiltemoin()
    {
        $data = Accueiltemoin::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accueiltemoins.store'), $data);

        $this->assertDatabaseHas('accueiltemoins', $data);

        $accueiltemoin = Accueiltemoin::latest('id')->first();

        $response->assertRedirect(route('accueiltemoins.edit', $accueiltemoin));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_accueiltemoin()
    {
        $accueiltemoin = Accueiltemoin::factory()->create();

        $response = $this->get(route('accueiltemoins.show', $accueiltemoin));

        $response
            ->assertOk()
            ->assertViewIs('app.accueiltemoins.show')
            ->assertViewHas('accueiltemoin');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_accueiltemoin()
    {
        $accueiltemoin = Accueiltemoin::factory()->create();

        $response = $this->get(route('accueiltemoins.edit', $accueiltemoin));

        $response
            ->assertOk()
            ->assertViewIs('app.accueiltemoins.edit')
            ->assertViewHas('accueiltemoin');
    }

    /**
     * @test
     */
    public function it_updates_the_accueiltemoin()
    {
        $accueiltemoin = Accueiltemoin::factory()->create();

        $data = [
            'section' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'imagetitle' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('accueiltemoins.update', $accueiltemoin),
            $data
        );

        $data['id'] = $accueiltemoin->id;

        $this->assertDatabaseHas('accueiltemoins', $data);

        $response->assertRedirect(route('accueiltemoins.edit', $accueiltemoin));
    }

    /**
     * @test
     */
    public function it_deletes_the_accueiltemoin()
    {
        $accueiltemoin = Accueiltemoin::factory()->create();

        $response = $this->delete(
            route('accueiltemoins.destroy', $accueiltemoin)
        );

        $response->assertRedirect(route('accueiltemoins.index'));

        $this->assertDeleted($accueiltemoin);
    }
}
