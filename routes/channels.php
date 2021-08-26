<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('Live', function ($user) {
    return Auth::check() || ! LteAdmin::guest();
});

Broadcast::channel('user.exec', function ($user) {
    return $user && (int) $user->id;
});

Broadcast::channel('App.Models.Admin.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
}, ['guards' => 'lte']);

Broadcast::channel('exec', function ($user) {
    return $user && (int) $user->id;
}, ['guards' => 'lte']);
