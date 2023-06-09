<?php

namespace App\Http\Controllers;

use App\Enums\ItemEnum;
use App\Models\{Item, Category, ReviewItem};
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
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
        if ($request->filled('category_id')) {
            $category = Category::find($request->category_id);
        }
        $categories = Category::all()->pluck('name', 'id');
        $data = [
            'title' =>  'Создание нового параметра',
            'category' => $category,
            'categories' => $categories
        ];

        return view('item.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }

        $request->unit = ItemEnum::tryFrom($request->unit);
        $item  = Item::create($request->all());
        session()->flash('success', 'Запись успешно создана');
        return redirect(route('category.index'));

        //  return redirect(route('item.edit', ['item' => $item]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }
        $categories = Category::all()->pluck('name', 'id');
        $data = [
            'title' =>  'Редактирование параметра',
            'item' => $item,
            'categories' => $categories
        ];

        return view('item.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }
        $input = $request->all();
        $item->update($input);
        session()->flash('success', 'Запись успешно обновлена');
        return redirect(route('category.index'));

        // return redirect(route('item.edit', ['item' => $item]));
    }

    /**
     * Remove the specified resource from storage.
     */
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

        $item = Item::find($request->category_id);
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
        $category = Item::withTrashed()->find($request->category_id);
        $category->restore();

        return response()->json([
            'false' => true,
            'message' => 'Запись восстановлена'
        ], 200);
    }
}
