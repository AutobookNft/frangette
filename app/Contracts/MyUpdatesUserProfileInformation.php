<?php

namespace App\Contracts;

interface MyUpdatesUserProfileInformation
{
 /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input);
}
