<?php

namespace App\Services\UserManagerment;

use App\Models\User;

class UserService
{
    protected UserModelsProxy $userModelsProxy;

    public function __construct(UserModelsProxy $userModelsProxy)
    {
        $this->userModelsProxy = $userModelsProxy;
    }

    public function getUser()
    {
        return $this->userModelsProxy->getUser();
    }

    public function showUser(User $user)
    {
        return $this->userModelsProxy->showUser($user);
    }

}
