<?php

namespace App\Policies;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ImagePolicy
{
    public function viewAny(User $user): bool
    {
        if ($user->hasVerifiedEmail()) {
            if ($user->role === "admin") {
                return true;
            }
            return true;
        }
        return false;
    }
    public function view(User $user, Image $image): bool
    {
        if ($user->hasVerifiedEmail()) {
            if ($user->role === "admin") {
                return true;
            }
            return $user->images()->where("id", $image->id)->first() == $image;
        }
        return false;
    }
    public function create(User $user): bool
    {
        return $user->hasVerifiedEmail();
    }
    public function delete(User $user, Image $image): bool
    {
        if ($user->role === "admin") {
            return true;
        }
        return $user->images()->where("id", $image->id)->first() == $image;
    }
}
