<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use Illuminate\Support\Facades\Gate;

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
        if (!Gate::allows('manage building')) {
            return abort(401);
        }

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
        if (!Gate::allows('manage building')) {
            return abort(401);
        }
        $building = Building::create($request->all());
        session()->flash('success', 'Здание успешно создано');

        return redirect(route('building.edit', ['building' => $building]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        $data = [
            'building' => $building
        ];
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
        if (!Gate::allows('manage building')) {
            return abort(401);
        }

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
        if (!Gate::allows('manage building')) {
            return abort(401);
        }
        $input = $request->all();
        // isset($input['active']) ? $input['active'] = '1' : $input['active'] = '0';
        $item = $building->update($input);
        session()->flash('success', 'Здание успешно обновлено');

        return redirect(route('building.edit', ['building' => $building]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        if (!Gate::allows('manage building')) {
            return abort(401);
        }
        // TODO удаление!
    }
}
