<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $carbonDate = Carbon::parse($this->created_at);
        $carbonDate = $carbonDate->format('Y-m-d H:i:s');
        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "path"=> Storage::url($this->path),
            "created_at"=> $carbonDate,
        ];
    }
}
