<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Review, ReviewItem};
use App\Http\Resources\Api\{ReviewResource, ReviewItemResource};

class ReviewController extends Controller
{

    public function index(Request $request)
    {
        $offset = 0; // start row index.
        $limit = 10; // no of records to fetch/ get .

        $sortDirection = 'desc';
        $sortField = 'created_at';

        $items = Review::query();

        if ($request->filled('with_trashed')) {

            $items->withTrashed();
        }


        if ($request->filled('offset')) {
            $offset = $request->offset;
        }

        if ($request->filled('limit')) {
            $limit = $request->limit;
        }

        $res = array();

        if ($request->filled('search')) {

            $items ->with('building', 'creator')->search($request->search)->orderBy('created_at', 'desc') ;
            $res['total'] = $items->count();
        } else {
            $items ->with('building', 'creator')->offset($offset)->limit($limit)->orderBy('created_at', 'desc')->get();

            $res['total'] = Review::count();
        }


        $items = $items->get();

        $items->transform(function (Review $items) {
            return (new ReviewResource($items));
        });

        $res['items'] = $items;

        return json_encode($res);
    }



    public function list(Request $request)
    {


        $sortDirection = 'desc';
        $sortField = 'created_at';

        $res = array();

        if ($request->filled('search')) {

            $items = ReviewItem::where('review_id', $request->review_id)->search($request->search)->orderBy('id', 'desc')->get();
            $res['total'] = $items->count();
        } else {
            $items = ReviewItem::where('review_id', $request->review_id)->orderBy('id', 'desc')->get();

            $res['total'] = ReviewItem::where('review_id', $request->review_id)->count();
        }
        $items->load('item', 'item.category');
        // dd($items);

        $items->transform(function (ReviewItem $items) {
            return (new ReviewItemResource($items));
        });

        $res['items'] = $items;

        return json_encode($res);
    }

    // Отчет по объекту
    public function report(Request $request)
    {
// ->orderBy('id', 'desc')

        $items = ReviewItem::where('review_id', $request->review_id)->where('check', 'Да')->get();

        $res['total'] = ReviewItem::where('review_id', $request->review_id)->where('check', 'Да')->count();

        $items->load('item', 'item.category');
        // dd($items);

        // TODO только с отметками о наличии

        $items->transform(function (ReviewItem $items) {
            return (new ReviewItemResource($items));
        });

        $res['items'] = $items;

        return json_encode($res);
    }


    /**
     *  
     */
    public function select_list(Request $request)
    {
        //

        $res = array(

            "null" => "---",
            "Да" => "Да",
            "Нет" => "Нет",
            "Отсутствует" => "Отсутствует"

        );


        return  json_encode($res);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request )
    {
        //
        dd($request->all());
    }
}
