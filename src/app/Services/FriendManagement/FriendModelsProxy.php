<?php

namespace App\Services\FriendManagement;
use App\Models\User;
use Illuminate\Http\Request;

class FriendModelsProxy
{
    public function getFriend() {
        return response([
            'friends' => request()->user()->friends(),
            'requests' => request()->user()->pending_friend_requests(),
        ]);
    }

    public function creatFriend(Request $request, User $user) {
        return $request->user()->add_friend($user->id);
    }

    public function updateFriend(Request $request, User $user) {
        return $request->user()->accept_friend($user->id);
    }

    public function deleteFriend(User $user) {
        return request()->user()->delete_friend($user->id);
    }

    public function denyUser(User $user) {
        return request()->user()->deny_friend($user->id);
    }
}
