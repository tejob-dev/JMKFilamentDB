<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Slide;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SlideControllerTest extends TestCase
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
    public function it_displays_index_view_with_slides()
    {
        $slides = Slide::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('slides.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.slides.index')
            ->assertViewHas('slides');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_slide()
    {
        $response = $this->get(route('slides.create'));

        $response->assertOk()->assertViewIs('app.slides.create');
    }

    /**
     * @test
     */
    public function it_stores_the_slide()
    {
        $data = Slide::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('slides.store'), $data);

        $this->assertDatabaseHas('slides', $data);

        $slide = Slide::latest('id')->first();

        $response->assertRedirect(route('slides.edit', $slide));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_slide()
    {
        $slide = Slide::factory()->create();

        $response = $this->get(route('slides.show', $slide));

        $response
            ->assertOk()
            ->assertViewIs('app.slides.show')
            ->assertViewHas('slide');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_slide()
    {
        $slide = Slide::factory()->create();

        $response = $this->get(route('slides.edit', $slide));

        $response
            ->assertOk()
            ->assertViewIs('app.slides.edit')
            ->assertViewHas('slide');
    }

    /**
     * @test
     */
    public function it_updates_the_slide()
    {
        $slide = Slide::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'soustitle' => $this->faker->text,
            'boutontitre' => $this->faker->text(255),
            'boutonlien' => $this->faker->text(255),
            'icone' => $this->faker->text(255),
        ];

        $response = $this->put(route('slides.update', $slide), $data);

        $data['id'] = $slide->id;

        $this->assertDatabaseHas('slides', $data);

        $response->assertRedirect(route('slides.edit', $slide));
    }

    /**
     * @test
     */
    public function it_deletes_the_slide()
    {
        $slide = Slide::factory()->create();

        $response = $this->delete(route('slides.destroy', $slide));

        $response->assertRedirect(route('slides.index'));

        $this->assertDeleted($slide);
    }
}
