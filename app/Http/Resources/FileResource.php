<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $file = $this->resource;
        return [
            'id' => $file->id,
            'name' => $file->name,
            'slug' => $file->slug,
            'path' => asset($file->path)
        ];
    }
}
