<?php

namespace App\Http\Controllers;

use App\Services\FriendService;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;

class FriendControllerApi extends Controller
{
    protected FriendService $friendService;

    public function __construct(FriendService $friendService)
    {
        $this->friendService = $friendService;
    }

    public function index() {
       return $this->friendService->getFriend();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user) {
        return $this->friendService->creatFriend($request, $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) {
       return $this->friendService->updateFriend($request, $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        return $this->friendService->deleteFriend($user);
    }

    /**
     * Igore the specified resource in storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function deny(User $user) {
        return $this->friendService->denyUser($user);
    }
}
