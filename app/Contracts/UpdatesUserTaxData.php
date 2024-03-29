<?php

namespace App\Contracts;

interface UpdatesUserTaxData
{

    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input, array $inputFront, array $inputRetro);

}
