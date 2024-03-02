<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        auth()->user()->followings()->attach($user);
        return $this->sendSuccess(['message' => 'Successfully followed user'], 200);
    }

    public function unfollow(User $user)
    {
        auth()->user()->followings()->detach($user);
        return $this->sendSuccess(['message' => 'Successfully unfollowed user'], 200);
    }
}
