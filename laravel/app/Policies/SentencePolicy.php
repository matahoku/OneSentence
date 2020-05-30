<?php

namespace App\Policies;

use App\Sentence;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SentencePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any sentences.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the sentence.
     *
     * @param  \App\User  $user
     * @param  \App\Sentence  $sentence
     * @return mixed
     */
    public function view(?User $user, Sentence $sentence)
    {
        return true;
    }

    /**
     * Determine whether the user can create sentences.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the sentence.
     *
     * @param  \App\User  $user
     * @param  \App\Sentence  $sentence
     * @return mixed
     */
    public function update(User $user, Sentence $sentence)
    {
        return $user->id === $sentence->user_id;
    }

    /**
     * Determine whether the user can delete the sentence.
     *
     * @param  \App\User  $user
     * @param  \App\Sentence  $sentence
     * @return mixed
     */
    public function delete(User $user, Sentence $sentence)
    {
        return $user->id === $sentence->user_id;
    }

    /**
     * Determine whether the user can restore the sentence.
     *
     * @param  \App\User  $user
     * @param  \App\Sentence  $sentence
     * @return mixed
     */
    public function restore(User $user, Sentence $sentence)
    {
        return $user->id === $sentence->user_id;
    }

    /**
     * Determine whether the user can permanently delete the sentence.
     *
     * @param  \App\User  $user
     * @param  \App\Sentence  $sentence
     * @return mixed
     */
    public function forceDelete(User $user, Sentence $sentence)
    {
        return $user->id === $sentence->user_id;
    }
}
