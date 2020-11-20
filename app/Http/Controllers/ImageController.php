<?php

namespace App\Http\Controllers;

use App\Http\Requests\Image\StoreImageRequest;
use App\Http\Requests\Image\UpdateImageRequest;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\Image\ImagesResource;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')
                ->except('index', 'show');;
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
     * @param  StoreImageRequest  $request
     * @param  Image  $image
     * @return ImageResource
     */
    public function store(StoreImageRequest $request)
    {
        $image = new Image();
        $image->slug = $request->file('image')
                ->store('uploads', 'cloudinary');
        $image->title = $request->input('title');
        $image->alt = $request->input('alt');
        $image->save();

        return ImageResource::make($image);
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
