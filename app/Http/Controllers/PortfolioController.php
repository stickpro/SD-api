<?php

namespace App\Http\Controllers;

use App\Http\Requests\Portfolio\StorePortfolioRequest;
use App\Http\Requests\Portfolio\UpdatePortfolioRequest;
use App\Http\Resources\Portfolio\PortfolioEditResource;
use App\Http\Resources\Portfolio\PortfolioResource;
use App\Http\Resources\Portfolio\PortfoliosResource;
use App\Models\Portfolio;
use Database\Factories\PortfolioFactory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')
                ->except('index', 'show');
        $this->authorizeResource(Portfolio::class);
    }


    /**
     * @param  Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $portfolios = Portfolio::filtered()
                ->with('mockup', 'image', 'filter')
                ->paginate($request->input('count', 15));

        return PortfoliosResource::collection($portfolios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePortfolioRequest  $request
     * @return PortfolioResource
     */
    public function store(StorePortfolioRequest $request)
    {
        $portfolio = Portfolio::create($request->validated());
        return PortfolioResource::make($portfolio);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return PortfolioResource
     */
    public function show(Portfolio $portfolio)
    {
        $portfolio = $portfolio->load('mockup', 'image', 'filter', 'images');

        return PortfolioResource::make($portfolio);
    }


    /**
     * Update the specified resource in storage.
     * @param  UpdatePortfolioRequest  $request
     * @param  Portfolio  $portfolio
     * @return PortfolioResource
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $portfolio->update($request->validated());

        return PortfolioResource::make($portfolio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }

    /**
     * @param  Portfolio  $portfolio
     * @return PortfolioEditResource
     */
    public function edit(Portfolio $portfolio)
    {
        return PortfolioEditResource::make($portfolio->load(['mockup', 'image', 'filter', 'images']));
    }
}
