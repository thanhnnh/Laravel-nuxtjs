<?php

namespace App\Services\ChatManagement;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\ChatRoomBroadCast;

class ChatModelsProxy
{
    public function showFriend() {
        return response([
            'friends' => request()->user()->friends(),
            'requests' => request()->user()->pending_friend_requests(),
            'users' => auth()->user(),
        ]);
    }

    public function getFriend($chat) {
        $friend = User::find($chat);
        return response ([
            'friend' => $friend,
        ]);
    }

    public function getMessage(Request $request, $id ){
        $messages = Chat::where(function ($query) use ($id) {
            $query->where('user_id', Auth::user()->id)
                ->where('friend_id', $id);
        })
            ->orWhere(function ($query) use ($id) {
                $query->where('friend_id', Auth::user()->id)
                    ->where('user_id', $id);
            })
            ->orderBy('created_at', 'asc')
//            ->with(['user'])
            ->get();

        return response([
            'messages' => $messages,
            'friend_id' => $id,
            'user_id' => Auth::user()->id
        ]);
    }

    public function sendMessage(Request $request) {
        $chatRoom = Chat::create([
            'user_id' => $request->user_id,
            'friend_id' => $request->friend_id,
            'chats' => $request->message,
        ]);
        $chatRoom->load('user');

        broadcast(new ChatRoomBroadCast($chatRoom))->toOthers();
        return response()->json([
            'http' => 'ok'
        ],200);
    }
}
