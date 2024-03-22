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
use App\Models\{User,Order,Conversation};
 
Broadcast::channel('orders.{adminId}', function (User $user,$adminId) {
    // return $user->id === Order::findOrNew($orderId)->user_id;
    return $user->id = $adminId;
});

Broadcast::channel('employer-chat.{candidateId}', function (User $user, $candidateId) {
    return $user->id = $candidateId;
});
Broadcast::channel('candidate-chat.{employerId}', function (User $user, $employerId) {
    return $user->id = $employerId;
});
