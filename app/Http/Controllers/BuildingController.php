<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('manage building')) {
            $with_trashed = 1;
        }

        $data = [
            'title' =>  "Обслуживаемые здания",
            'with_trashed' =>   $with_trashed,
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
        return redirect(route('building.index'));
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
        $item = $building->update($input);
        session()->flash('success', 'Здание успешно обновлено');

        return redirect(route('building.index'));
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Request $request)
    {
        if (!Gate::allows('delete building')) {
            return response()->json([
                'error' => true,
                'message' => 'У вас отсутствуют права на удаление зданий'
            ], 422);
        }

        $item = Building::find($request->category_id);
        $items_count =  Review::where('building_id', $request->category_id)->count();

        if ($items_count > 0) {
            return response()->json([
                'error' => true,
                'message' => 'Нельзя удалить здания, которые использованы в отчетах'
            ], 422);
        }
        $item->delete();

        return response()->json([
            'false' => true,
            'message' => 'Здание удалено'
        ], 200);
    }


    public function undelete(Request $request)
    {
        if (!Gate::allows('delete building')) {
            return response()->json([
                'error' => true,
                'message' => 'У вас отсутствуют права на восстановление зданий'
            ], 422);
        }
        $category = Building::withTrashed()->find($request->category_id);
        $category->restore();

        return response()->json([
            'false' => true,
            'message' => 'Здание восстановлено'
        ], 200);
    }
}
