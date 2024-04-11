<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyDiscountRequest;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

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

    public function update(UpdateDiscountRequest $request): DiscountResource
    {
        $validated = $request->validated();
        $discount = Discount
            ::query()
            ->where('code', $validated['code'])
            ->first();

        $discount->update($validated);

        return DiscountResource::make($discount);
    }

    public function destroy(DestroyDiscountRequest $request): JsonResource
    {
        $validated = $request->validated();
        Discount
            ::query()
            ->where('code', $validated['code'])
            ->delete();

        abort(Response::HTTP_NO_CONTENT);
    }
}
