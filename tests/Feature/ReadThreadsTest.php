<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function a_user_can_browse_threads()
    {
        $response = $this->get('/threads');

        $response->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_a_signle_thread()
    {
        $response = $this->get('/threads/'.$this->thread->id);

        $response->assertSee($this->thread->title);
    }

    
    /** @test */
    public function a_user_can_read_replies_of_a_thread()
    {
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);

        $response = $this->get('/threads/'.$this->thread->id);

        $response->assertSee($reply->body);
    }
}
