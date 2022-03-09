<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Friendable;

class FriendService {

    protected FriendService $friendService;

    public function __construct(FriendService $friendService)
    {
        $this->friendService = $friendService;
    }

    public function getFriend() {
        return $this->friendService->getFriend();
    }

    public function creatFriend(Request $request, User $user) {
        return $this->friendService->creatFriend($request, $user);
    }

    public function updateFriend(Request $request, User $user) {
        return $this->friendService->updateFriend($request, $user);
    }

    public function deleteFriend(User $user) {
        return $this->friendService->deleteFriend($user);
    }

    public function denyUser(User $user) {
        return $this->friendService->denyUser($user);
    }
}
