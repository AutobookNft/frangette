<?php

use Laravel\Jetstream\Features;

return [
    'stack' => 'livewire',
    'middleware' => ['web'],
    'features' => [Features::accountDeletion()],
    'profile_photo_disk' => 'public',
];


