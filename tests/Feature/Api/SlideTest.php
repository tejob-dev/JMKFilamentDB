<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Slide;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SlideTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_slides_list()
    {
        $slides = Slide::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.slides.index'));

        $response->assertOk()->assertSee($slides[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_slide()
    {
        $data = Slide::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.slides.store'), $data);

        $this->assertDatabaseHas('slides', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.slides.update', $slide), $data);

        $data['id'] = $slide->id;

        $this->assertDatabaseHas('slides', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_slide()
    {
        $slide = Slide::factory()->create();

        $response = $this->deleteJson(route('api.slides.destroy', $slide));

        $this->assertDeleted($slide);

        $response->assertNoContent();
    }
}
