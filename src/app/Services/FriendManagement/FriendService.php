<?php

namespace App\Services\FriendManagement;

use App\Models\User;
use Illuminate\Http\Request;

class FriendService
{
    protected FriendModelsProxy $friendModelsProxy;

    public function __construct(FriendModelsProxy $friendModelsProxy)
    {
        $this->friendModelsProxy = $friendModelsProxy;
    }

    public function getFriend() {
        return $this->friendModelsProxy->getFriend();
    }

    public function creatFriend(Request $request, User $user) {
        return $this->friendModelsProxy->creatFriend($request, $user);
    }

    public function updateFriend(Request $request, User $user) {
        return $this->friendModelsProxy->updateFriend($request, $user);
    }

    public function deleteFriend(User $user) {
        return $this->friendModelsProxy->deleteFriend($user);
    }

    public function denyUser(User $user) {
        return $this->friendModelsProxy->denyUser($user);
    }
}
