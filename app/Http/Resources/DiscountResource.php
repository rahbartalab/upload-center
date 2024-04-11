<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $discount = $this->resource;
        return [
            'code' => $discount->code,
            'createdAt' => $this->dateFormat($discount->created_at),
            'expiredAt' => $this->dateFormat($discount->expired_at),
            'user' => UserResource::make($discount->user)
        ];
    }

    private function dateFormat($date): string
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}
