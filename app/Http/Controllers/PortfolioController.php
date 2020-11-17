<?php

namespace App\Http\Controllers;

use App\Http\Requests\Portfolio\StorePortfolioRequest;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {

        $filters = Portfolio::paginate($request->input('count', 15));

        return PortfoliosResource::collection($filters);
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
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
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
}
