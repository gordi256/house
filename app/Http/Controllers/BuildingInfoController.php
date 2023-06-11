<?php

namespace App\Http\Controllers;

use App\Models\BuildingInfo;
use App\Http\Requests\StoreBuildingInfoRequest;
use App\Http\Requests\UpdateBuildingInfoRequest;

class BuildingInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuildingInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BuildingInfo $buildingInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuildingInfo $buildingInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuildingInfoRequest $request, BuildingInfo $buildingInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuildingInfo $buildingInfo)
    {
        //
    }
}
