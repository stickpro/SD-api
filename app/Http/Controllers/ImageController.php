<?php

namespace App\Http\Controllers;

use App\Http\Requests\Image\StoreImageRequest;
use App\Http\Requests\Image\UpdateImageRequest;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\Image\ImagesResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Image::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $images = Image::paginate($request->input('count', 20));

        return ImagesResource::collection($images);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function store(StoreImageRequest $request)
    {
        $image = Image::create($request->validate());

        return ImageResource::collection($image);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return ImageResource
     */
    public function show(Image $image)
    {
        return ImageResource::make($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return ImageResource
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        $image->update($request->validate());

        return ImageResource::make($image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
