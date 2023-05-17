<?php

namespace App\Http\Controllers;

use App\Enums\ItemEnum;
use App\Models\{Item, Category};
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
        $request->unit  = ItemEnum::tryFrom($request->unit);
        // dd($request->all());
        $item  = Item::create($request->all());
        // flash('Message Category create')->success();
        return redirect(route('item.edit', ['item' => $item]));
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
        // $request->unit  = ItemEnum::tryFrom($request->unit);
        $input = $request->all();
        // dd( $input);
        // isset($input['active']) ? $input['active'] = '1' : $input['active'] = '0';
        $item->update($input);
        return redirect(route('item.edit', ['item' => $item]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
        // TODO удаление!

    }
}
