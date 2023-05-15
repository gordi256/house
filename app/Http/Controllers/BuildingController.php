<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' =>  "Обслуживаемые здания",
            'buildings' => "Обслуживаемые здания",
        ];
        return view('building.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = [
            'title' =>  "Новое здание",
            'buildings' => " Обслуживаемые здания",
        ];
        return view('building.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuildingRequest $request)
    {
        $building = Building::create($request->all());
        flash('Message Building create')->success();
        return redirect(route('building.edit', ['building' => $building]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        $data = [];
        return view('building.show', $data);
    }
    /**
     * Display the report resource.
     */
    public function review(Building $building)
    {
        $data = [
            'title' =>  "Отчеты по зданию " . $building->name,
            'building' => $building
        ];

        return view('building.review', $data);
    }


    /**
     * Display the new report resource.
     */
    // public function new(Building $building)
    // {
    //     //
    //     $data = [
    //         'building' => $building
    //     ];
    //     return view('building.review', $data);
    // }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
        $data = [
            'title' =>  "Редактирование здания",
            'building' => $building
        ];

        return view('building.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuildingRequest $request, Building $building)
    {
        $input = $request->all();
        // isset($input['active']) ? $input['active'] = '1' : $input['active'] = '0';
        $item = $building->update($input);
        flash('Данные по зданию обновлены успешно')->success();
        return redirect(route('building.edit', ['building' => $building]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        //
    }
}
