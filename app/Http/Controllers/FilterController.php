<?php

namespace App\Http\Controllers;

use App\Http\Requests\Filter\StoreFilterRequest;
use App\Http\Requests\Filter\UpdateFilterRequest;
use App\Http\Resources\Filter\FilterEditResource;
use App\Http\Resources\Filter\FilterResource;
use App\Models\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FilterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')
                ->except('index', 'show');
        $this->authorizeResource(Filter::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $filters = Filter::paginate($request->input('count', 15));

        return FilterResource::collection($filters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return FilterResource
     */
    public function store(StoreFilterRequest $request)
    {
        $filter = Filter::create($request->validated());

        return FilterResource::make($filter);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filter  $filter
     * @return FilterResource
     */
    public function show(Filter $filter)
    {
        return FilterResource::make($filter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filter  $filter
     * @return FilterEditResource
     */
    public function update(UpdateFilterRequest $request, Filter $filter)
    {
        $filter->update($request->validated());

        return FilterEditResource::make($filter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filter  $filter
     * @return FilterResource
     * @throws \Exception
     */
    public function destroy(Filter $filter)
    {
        $filter->delete();

        return FilterResource::make($filter);
    }

    /**
     * @param  \App\Models\Filter  $filter
     * @return FilterEditResource
     */
    public function edit(Filter $filter)
    {
        return FilterEditResource::make($filter);
    }
}
