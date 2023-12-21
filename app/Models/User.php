<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailInterface;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmailInterface
{
    use HasApiTokens, HasFactory, Notifiable, MustVerifyEmail;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function role():BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function images():MorphMany
    {
        return $this->morphMany(Image::class, "imageable");
    }
    public function favorites()
    {
        return $this->belongsToMany(Image::class);
    }
    public function hasFavorites($id):bool
    {
        return $this->favorites()->where('image_id', $id)->exists();
    }

}
