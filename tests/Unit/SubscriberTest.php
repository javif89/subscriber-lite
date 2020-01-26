<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
    protected $headers = ['HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest'];
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateSubscriber()
    {
        $url = '/api/subscriber';
        $user = factory(\App\User::class)->create();
        $payload = ['name' => 'Test Subscriber', 'email' => 'test@gmail.com', 'state' => 'active'];

        $response = $this->actingAs($user)->post($url, $payload, $this->headers);

        $response->assertStatus(201)->assertJson($payload);
    }
}
