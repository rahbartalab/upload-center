<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\File\StoreFileRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $files = File
            ::query()
            ->where('is_active', true)
            ->get();

        return FileResource::collection($files);
    }

    public function store(StoreFileRequest $request): JsonResponse
    {
        /** @var File $file */

        $uploadedFile = $request->file('file');
        $path = $uploadedFile->store('files', [
            'disk' => 'public',
        ]);

        $file = File::query()
            ->create([
                'path' => "/storage/{$path}",
                'name' => $uploadedFile->getClientOriginalName(),
                'slug' => Str::slug($uploadedFile->getClientOriginalName()),
                'user_id' => Auth::id()
            ]);

        return response()->json([
            'message' => __('response.store_successfully'),
            'data' => [
                'file' => FileResource::make($file)
            ]
        ]);
    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
