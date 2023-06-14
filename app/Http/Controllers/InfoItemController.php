<?php

namespace App\Http\Controllers;

use App\Models\{InfoItem , InfoCategory};
use App\Http\Requests\StoreInfoItemRequest;
use App\Http\Requests\UpdateInfoItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InfoItemController extends Controller
{
 

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }
        $category = false;
        if ($request->filled('info_category_id')) {
            $category = InfoCategory::find($request->category_id);
        }
        $categories = InfoCategory::all()->pluck('name', 'id');
        $data = [
            'title' =>  'Создание нового параметра',
            'category' => $category,
            'categories' => $categories
        ];

        return view('info_item.create', $data);
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInfoItemRequest $request)
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }

      
        $item  = InfoItem::create($request->all());
        session()->flash('success', 'Запись успешно создана');
        return redirect(route('info_category.index'));

        //  return redirect(route('item.edit', ['item' => $item]));
    }


    /**
     * Display the specified resource.
     */
    public function show(InfoItem $infoItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InfoItem $infoItem)
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }
        $categories = InfoCategory::all()->pluck('name', 'id');
        $data = [
            'title' =>  'Редактирование параметра',
            'item' => $infoItem,
            'categories' => $categories
        ];

        return view('info_item.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInfoItemRequest $request, InfoItem $infoItem)
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }
        $input = $request->all();
        $infoItem->update($input);
        session()->flash('success', 'Запись успешно обновлена');
        return redirect(route('info_category.index'));
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

        $item = InfoItem::find($request->category_id);
        $items_count =  ReviewItem::where('item_id', $request->category_id)->count();

        if ($items_count > 0) {
            return response()->json([
                'error' => true,
                'message' => 'Нельзя удалить записи, которые использованы в отчетах'
            ], 422);
        }
        $item->delete();

        return response()->json([
            'false' => true,
            'message' => 'Запись удалена'
        ], 200);
    }


    public function undelete(Request $request)
    {
        if (!Gate::allows('delete item')) {
            return response()->json([
                'error' => true,
                'message' => 'У вас отсутствуют права на восстановление'
            ], 422);
        }
        $category = InfoItem::withTrashed()->find($request->category_id);
        $category->restore();

        return response()->json([
            'false' => true,
            'message' => 'Запись восстановлена'
        ], 200);
    }
}
