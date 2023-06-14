<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{InfoCategory, InfoItem};
use App\Http\Resources\Api\{InfoCategoryResource, InfoItemListResource};
use Illuminate\Support\Facades\Gate;

class InfoCategoryController extends Controller
{

    public function index(Request $request)
    {
        $offset = 0; // start row index.
        $limit = 100; // no of records to fetch/ get .
        $sortDirection = 'desc';
        $sortField = 'created_at';

        $items = InfoCategory::query();


        if ($request->filled('with_trashed')) {

            $items->withTrashed();
        }



        // if ($request->filled('offset')) {
        //     $offset = $request->offset;
        // }

        // if ($request->filled('limit')) {
        //     $limit = $request->limit;
        // }

        $res = array();

        if ($request->filled('search')) {
            $items->search($request->search)->orderBy('order_column', 'asc')->withCount('item');
            $res['total'] = $items->count();
        } else {
            $items->orderBy('order_column', 'asc')->withCount('item');
            $res['total'] = $items->count();
        }
        $items = $items->get();
        //  dd($items2);

        $items->transform(function (InfoCategory $items) {
            return (new InfoCategoryResource($items));
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

        $items = InfoItem::query();


        if ($request->filled('with_trashed')) {

            $items->withTrashed();
        }

        $res = array();

        if ($request->filled('search')) {

            $items =  $items->where('info_category_id', $request->category_id)->search($request->search)->orderBy('order_column', 'asc');

            $res['total'] = $items->count();
        } else {

            $items =  $items->where('info_category_id', $request->category_id)->orderBy('order_column', 'asc');


            $res['total'] =  $items->where('info_category_id', $request->category_id)->count();
        }
        $items = $items->get();

        $items->transform(function (InfoItem $items) {
            return (new InfoItemListResource($items));
        });

        $res['items'] = $items;
        return json_encode($res);
    }
}
