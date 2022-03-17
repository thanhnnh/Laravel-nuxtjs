<?php

namespace App\Services\ChatManagement;

use App\Models\Chat;
use App\Models\User;
use App\Services\FriendManagement\FriendModelsProxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatService
{
    protected ChatModelsProxy $chatModelsProxy;

    public function __construct(ChatModelsProxy $chatModelsProxy)
    {
        $this->chatModelsProxy = $chatModelsProxy;
    }

    public function showFriend() {
        return $this->chatModelsProxy->showFriend();
    }

    public function getFriend($chat) {
        return $this->chatModelsProxy->getFriend($chat);
    }

    public function getMessage(Request $request, $id ){
        return $this->chatModelsProxy->getMessage($request, $id);
    }

    public function sendMessage(Request $request) {
        return $this->chatModelsProxy->sendMessage($request);
    }
}
