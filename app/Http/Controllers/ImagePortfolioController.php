<?php

namespace App\Http\Controllers;

use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\Portfolio\PortfolioResource;
use App\Models\Image;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class ImagePortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');

        $this->authorizeResource(Portfolio::class);
    }

    public function store(Image $image, Portfolio $portfolio)
    {
        $this->authorize('update', $portfolio);

        $portfolio->images()->attach($image);

        return ImageResource::make($image);
    }

    public function delete(Image $image, Portfolio $portfolio)
    {
        $this->authorize('update', $portfolio);

        $portfolio->images()->detach($image);

        return ImageResource::make($image);
    }
}
