<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_unauthenticated_user_may_not_crate_reply()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/threads/1/replies', []);
    }

    /** @test */
    public function an_authenticated_user_can_reply_to_a_thread()
    {
        $user = factory('App\User')->create();
        $thread = factory('App\Thread')->create();
        $reply = factory('App\Reply')->make();

        $this->be($user);

        $this->post('/threads/'.$thread->id.'/replies', $reply->toArray());

        $response = $this->get('/threads/'.$thread->id);

        $response->assertSee($reply->body);
    }
}
