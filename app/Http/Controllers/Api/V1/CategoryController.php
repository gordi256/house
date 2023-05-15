<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Category, Item};
use App\Http\Resources\Api\{CategoryResource, ItemListResource};

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $offset = 0; // start row index.
        $limit = 100; // no of records to fetch/ get .
        $sortDirection = 'desc';
        $sortField = 'created_at';
        // if ($request->filled('offset')) {
        //     $offset = $request->offset;
        // }

        // if ($request->filled('limit')) {
        //     $limit = $request->limit;
        // }

        $res = array();

        if ($request->filled('search')) {
            $items = Category::search($request->search)->orderBy('order_column', 'asc')->withCount('item')->get();
            $res['total'] = $items->count();
        } else {
            $items = Category::offset($offset)->limit($limit)->orderBy('order_column', 'asc')->withCount('item')->get();
            $res['total'] = Category::count();
        }

        $items->transform(function (Category $items) {
            return (new CategoryResource($items));
        });

        $res['items'] = $items;
        return json_encode($res);
    }

    public function show(Request $request)
    {
        $offset = 0; // start row index.
        $limit = 100; // no of records to fetch/ get .
        $sortDirection = 'desc';
        $sortField = 'created_at';
        // if ($request->filled('offset')) {
        //     $offset = $request->offset;
        // }

        // if ($request->filled('limit')) {
        //     $limit = $request->limit;
        // }

        $res = array();

        if ($request->filled('search')) {

            $items = Item::where('category_id', $request->category_id)->search($request->search)->orderBy('order_column', 'asc')->get();

            $res['total'] = $items->count();
        } else {

            $items = Item::where('category_id', $request->category_id)->orderBy('order_column', 'asc')->get();


            $res['total'] = Item::where('category_id', $request->category_id)->count();
        }

        $items->transform(function (Item $items) {
            return (new ItemListResource($items));
        });

        $res['items'] = $items;
        return json_encode($res);
    }
}
