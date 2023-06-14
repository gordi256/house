<?php

namespace App\Http\Controllers;

use App\Models\InfoCategory;
use App\Http\Requests\StoreInfoCategoryRequest;
use App\Http\Requests\UpdateInfoCategoryRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class InfoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('manage item')) {
            $with_trashed = 1;
        }

        $data = [
            'title' =>  "Не знаю как назвать",
            'with_trashed' =>   $with_trashed,
        ];
        return view('info_category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }

        $data = [
            'title' =>  "Новая категория",
        ];
        return view('info_category.create',    $data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInfoCategoryRequest $request)
    {
      
        $infoCategory  = InfoCategory::create($request->validated());
        session()->flash('success', 'Категория успешно создана');
        return redirect(route('info_category.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(InfoCategory $infoCategory)
    {
        if (Gate::allows('manage item')) {
            $with_trashed = 1;
        }

        $data = [
            'title' =>  "Категория " . $infoCategory->name,
            'with_trashed' =>   $with_trashed,
            'category' => $infoCategory
        ];

        return view('info_category.show',   $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InfoCategory $infoCategory)
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }

        $data = [
            'title' =>  "Редактирование категории " . $infoCategory->name,
            'category' => $infoCategory
        ];

        return view('info_category.edit',   $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInfoCategoryRequest $request, InfoCategory $infoCategory)
    {
        $input = $request->all();
        // isset($input['active']) ? $input['active'] = '1' : $input['active'] = '0';
        $infoCategory->update($input);
        session()->flash('success', 'Категория успешно обновлена');
        return redirect(route('category.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
 
    public function destroy(Request $request)
    {
        if (!Gate::allows('delete item')) {
            return response()->json([
                'error' => true,
                'message' => 'У вас отсутствуют права на удаление категории'
            ], 422);
        }

        $category = InfoCategory::withCount('item')->find($request->category_id);

        if ($category->item_count > 0) {
            return response()->json([
                'error' => true,
                'message' => 'Нельзя удалить категорию, у которой есть записи'
            ], 422);
        }
        $category->delete();
        return response()->json([
            'false' => true,
            'message' => 'Категория удалена'
        ], 200);
    }

    public function undelete(Request $request)
    {
        if (!Gate::allows('delete item')) {
            return response()->json([
                'error' => true,
                'message' => 'У вас отсутствуют права на восстановление категории'
            ], 422);
        }
        $category = InfoCategory::withTrashed()->find($request->category_id);
        $category->restore();
        return response()->json([
            'false' => true,
            'message' => 'Категория восстановлена'
        ], 200);
    }
}
