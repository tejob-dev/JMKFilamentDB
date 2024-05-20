<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Typeformation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeformationControllerTest extends TestCase
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
    public function it_displays_index_view_with_typeformations()
    {
        $typeformations = Typeformation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('typeformations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.typeformations.index')
            ->assertViewHas('typeformations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_typeformation()
    {
        $response = $this->get(route('typeformations.create'));

        $response->assertOk()->assertViewIs('app.typeformations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_typeformation()
    {
        $data = Typeformation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('typeformations.store'), $data);

        $this->assertDatabaseHas('typeformations', $data);

        $typeformation = Typeformation::latest('id')->first();

        $response->assertRedirect(route('typeformations.edit', $typeformation));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_typeformation()
    {
        $typeformation = Typeformation::factory()->create();

        $response = $this->get(route('typeformations.show', $typeformation));

        $response
            ->assertOk()
            ->assertViewIs('app.typeformations.show')
            ->assertViewHas('typeformation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_typeformation()
    {
        $typeformation = Typeformation::factory()->create();

        $response = $this->get(route('typeformations.edit', $typeformation));

        $response
            ->assertOk()
            ->assertViewIs('app.typeformations.edit')
            ->assertViewHas('typeformation');
    }

    /**
     * @test
     */
    public function it_updates_the_typeformation()
    {
        $typeformation = Typeformation::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'text' => $this->faker->text,
            'icone' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('typeformations.update', $typeformation),
            $data
        );

        $data['id'] = $typeformation->id;

        $this->assertDatabaseHas('typeformations', $data);

        $response->assertRedirect(route('typeformations.edit', $typeformation));
    }

    /**
     * @test
     */
    public function it_deletes_the_typeformation()
    {
        $typeformation = Typeformation::factory()->create();

        $response = $this->delete(
            route('typeformations.destroy', $typeformation)
        );

        $response->assertRedirect(route('typeformations.index'));

        $this->assertDeleted($typeformation);
    }
}
