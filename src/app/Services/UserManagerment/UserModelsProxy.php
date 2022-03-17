<?php

namespace App\Services\UserManagerment;

use App\Models\User;
use Illuminate\Http\Request;

class UserModelsProxy
{
    public function getUser()
    {
        return response(['users' => User::where('id', '!=', request()->user()->id)->get()]);
    }

    public function showUser(User $user)
    {
        return response([
            'user' => $user,
            'isFriendsWith' => request()->user()->is_friends_with($user->id),
            'friendRequestSentTo' => request()->user()->has_pending_friend_request_sent_to($user->id),
            'friendRequestSentFrom' => request()->user()->has_pending_friend_request_from($user->id),
        ]);
    }
}
