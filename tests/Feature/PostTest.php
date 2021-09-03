<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_PostWhenNoPost()
    {
        $response = $this->get('/posts');
        $response->assertSeeText('No blog posts yet!');
    }
    public function test_Post1BlogPostAtLeastThere()
    {

        // Step 1 Arrange Part
        $blogpost = new BlogPost();
        $blogpost->title = 'New Title';
        $blogpost->content = 'this is a new content';
        $blogpost->save();

        // Step 2 ACT Part
        $response = $this->get('/posts');

        // Step 3 Assert part 
        $response->assertSeeText('Form check');
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Form check'
        ]);
    }
}
