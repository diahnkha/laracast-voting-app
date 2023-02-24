<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Idea;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    public function lists_of_ideas_shows_on_main_page()
    {
        $ideaOne = Idea::factory()->create([
            'title' = 'My First Idea',
            'description' = 'Description of my first idea',
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' = 'My Second Idea',
            'description' = 'Description of my second idea',
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);

    }

    public function single_idea_shows_correctly_on_the_show_page()
    {
        $idea = Idea::factory()->create([
            'title' = 'My First Idea',
            'description' = 'Description of my first idea',
        ]);

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();

        $response->assertSee($idea->title);
        $response->assertSee($idea->description);


    }

    public function ideas_pagination_works()
    {
        Idea::factory(Idea::PAGINATION_COUNT + 1)->create();

        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My First Idea';
        $ideaOne->save(); 


        $ideaEleven = Idea::find(11);
        $ideaEleven->title = 'My Elevent Idea';
        $ideaEleven ->save(); 

        $response = $this->get('/');

        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);

        $response = $this->get('/?page=2');

        $response->assertSee($ideaEleven->title);
        $response->assertDontSee($ideaOne->title);
    }

    /** @test */
    public function same_idea_title_different_slugs()
    {
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My First Idea',
        ]);

        $this->assertEquals('my-first-idea', $ideaOne->slug);
        $this->assertEquals('my-first-idea-2', $ideaTwo->slug);
    }
    
}
