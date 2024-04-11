<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;

class DiscountController extends Controller
{
    public function store(StoreDiscountRequest $request): JsonResponse
    {
        /** @var Discount $discount */

        $discount = Discount
            ::query()
            ->create(array_merge($request->validated(), ['code' => Str::random(10)]));

        return response()->json([
            'message' => __('response.store_successfully'),
            'data' => [
                'code' => $discount->code
            ]
        ]);
    }

    public function index(): AnonymousResourceCollection
    {
        $discounts = Discount::all();

        return DiscountResource::collection($discounts);
    }

    public function update(UpdateDiscountRequest $request)
    {
        $validated = $request->validated();
        $discount = Discount
            ::query()
            ->where('code', $validated['code'])
            ->first();

        $discount->update($validated);

        return DiscountResource::make($discount);
    }
}
