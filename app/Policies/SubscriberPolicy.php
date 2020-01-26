<?php

namespace App\Policies;

use App\Subscriber;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the subscriber.
     *
     * @param  \App\User  $user
     * @param  \App\Subscriber  $subscriber
     * @return mixed
     */
    public function view(User $user, Subscriber $subscriber)
    {
        return true;
    }

    /**
     * Determine whether the user can create subscribers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the subscriber.
     *
     * @param  \App\User  $user
     * @param  \App\Subscriber  $subscriber
     * @return mixed
     */
    public function update(User $user, Subscriber $subscriber)
    {
        return $user->id === $subscriber->user_id;
    }

    /**
     * Determine whether the user can delete the subscriber.
     *
     * @param  \App\User  $user
     * @param  \App\Subscriber  $subscriber
     * @return mixed
     */
    public function delete(User $user, Subscriber $subscriber)
    {
        return $user->id === $subscriber->user_id;
    }
}
