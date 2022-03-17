<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ChatManagement\ChatService;
use App\Services\FriendManagement\FriendService;
use App\Services\UserManagerment\UserService;
use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class ChatControllerApi extends Controller
{
    protected ChatService $chatService;

    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }



    public function index() {
        return $this->chatService->showFriend();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->chatService->sendMessage($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($chat) {
        return $this->chatService->getFriend($chat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function history (Request $request, $id) {
        return $this->chatService->getMessage($request, $id);
    }
}
