<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Building, Item};

use App\Http\Resources\Api\{ItemResource, BuildingResource};
use App\Models\{Review, ReviewItem};
use App\Http\Resources\Api\{ReviewResource, ReviewItemResource};

class TestController extends Controller
{
    public function test(Request $request)
    {

        $offset = 0; // start row index.
        $limit = 10; // no of records to fetch/ get .

        // $sortDirection = 'desc';
        // $sortField = 'created_at';
        // if ($request->filled('offset')) {
        //     $offset = $request->offset;
        // }

        // if ($request->filled('limit')) {
        //     $limit = $request->limit;
        // }

        $res = array();
        // $items = Item::with('category')->get();


        $sortDirection = 'asc';

        $items = Item::with(['category' => function ($query) use ($sortDirection) {
            $query->orderBy('order_column', $sortDirection);
        }])->orderBy('order_column', $sortDirection)->get();;
        $res['total'] = Item::count();

        $items->transform(function (Item $items) {
            return (new ItemResource($items));
        });

        $res['items'] = $items;

        return json_encode($res);
    }

    public function test2(Request $request)
    {
        $request->review_id = 51;
        $items = ReviewItem::where('review_id', $request->review_id)->where('check', 'Да')->orderBy('created_at', 'desc')->get();

        $res['total'] = ReviewItem::where('review_id', $request->review_id)->where('check', 'Да')->count();

        $items->load('item', 'item.category');
        // dd($items);

        // TODO только с отметками о наличии

        $items->transform(function (ReviewItem $items) {
            return (new ReviewItemResource($items));
        });

        $res['items'] = $items;
        return json_encode($res['items'], $res['total']);

        // return json_encode($res);

        // $res = array();
        // $items = Item::with('category')->orderBy('category_id', 'asc')->get();
        // $res['total'] = Item::count();

        // $items->transform(function (Item $items) {
        //     return (new ItemResource($items));
        // }); 

        // $res['items'] = $items;

        // // return json_encode($res);
        // return json_encode($res['items'], $res['total']);

        //return this.Json(new { records, total }, JsonRequestBehavior.AllowGet);


    }
}
