<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
    protected $headers = ['HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest'];

    public function testCreateSubscriber()
    {
        $url = '/api/subscriber';
        $user = factory(\App\User::class)->create();
        $payload = ['name' => 'Test Subscriber', 'email' => 'test@gmail.com', 'state' => 'active'];

        $response = $this->actingAs($user)->post($url, $payload, $this->headers);

        $response->assertStatus(201)->assertJson($payload);
    }

    public function testUpdateSubscriber()
    {
        // First create the subscriber
        $url = route('subscriber.store');
        $user = factory(\App\User::class)->create();
        $payload = ['name' => 'Test Subscriber', 'email' => 'test@gmail.com', 'state' => 'active'];

        $response = $this->actingAs($user)->post($url, $payload, $this->headers);

        $id = $response->json('id');

        // Then update the subscriber
        $url = route('subscriber.update', ['subscriber' => $id]);
        $response = $this->actingAs($user)->put($url, ['state' => 'bounced'], $this->headers);

        $response->assertStatus(200)->assertJson(['id' => $id, 'state' => 'bounced']);
    }

    public function testDeleteSubscriber()
    {
        // First create the subscriber
        $url = route('subscriber.store');
        $user = factory(\App\User::class)->create();
        $payload = ['name' => 'Test Subscriber', 'email' => 'test@gmail.com', 'state' => 'active'];

        $response = $this->actingAs($user)->post($url, $payload, $this->headers);

        $id = $response->json('id');

        // Then delete the subscriber and assert they no longer exist
        $url = route('subscriber.destroy', ['subscriber' => $id]);
        $response = $this->actingAs($user)->delete($url, [], $this->headers);

        $response->assertStatus(204);

        $url = route('subscriber.show', ['subscriber' => $id]);
        $this->actingAs($user)->get($url, $this->headers)->assertStatus(404);
    }
}
