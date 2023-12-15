<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ImagePolicy
{
    public function viewAny(User $user): bool
    {
        if ($user->role === "admin") {
            return true;
        }
        return true;
    }
    public function view(User $user, Image $image): bool
    {
        if ($user->role === "admin") {
            return true;
        }
        return $user->images()->where("id", $image->id)->first() == $image;
    }
    public function create(User $user): bool
    {
        return true;
    }
    public function delete(User $user, Image $image): bool
    {
        if ($user->role === "admin") {
            return true;
        }
        return $user->images()->where("id", $image->id)->first() == $image;
    }
}
