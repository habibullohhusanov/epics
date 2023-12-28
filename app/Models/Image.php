<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        "path", "name",
    ];
    protected $casts = [
        'created_at' => 'datetime',
    ];
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
    public function user()
    {
        $this->belongsToMany(User::class,);
    }
}
