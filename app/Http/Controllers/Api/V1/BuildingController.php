<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Building, Review};
use App\Http\Resources\Api\{BuildingResource, ReviewResource};

class BuildingController extends Controller
{

    public function index(Request $request)
    {
        $offset = 0; // start row index.
        $limit = 10; // no of records to fetch/ get .

        $sortDirection = 'desc';
        $sortField = 'created_at';
        if ($request->filled('offset')) {
            $offset = $request->offset;
        }

        if ($request->filled('limit')) {
            $limit = $request->limit;
        }

        $res = array();
        if ($request->filled('search')) {
            $items = Building::search($request->search)->orderBy('created_at', 'desc')->get();
            $res['total'] = $items->count();
        } else {
            $items = Building::offset($offset)->limit($limit)->orderBy('created_at', 'desc')->get();
            $res['total'] = Building::count();
        }

        $items->transform(function (Building $items) {
            return (new BuildingResource($items));
        });

        $res['items'] = $items;
        return json_encode($res);
    }

    public function review(Request $request)
    {

        $offset = 0; // start row index.
        $limit = 10; // no of records to fetch/ get .

        $sortDirection = 'desc';
        $sortField = 'created_at';
        if ($request->filled('offset')) {
            $offset = $request->offset;
        }

        if ($request->filled('limit')) {
            $limit = $request->limit;
        }

        $res = array();

        // if ($request->filled('search')) {

        //     $items = Building::search($request->search)->orderBy('created_at', 'desc')->get();
        //     $res['total'] = $items->count();
        // } else {
        $items = Review::where('building_id', $request->building_id)->offset($offset)->limit($limit)->orderBy('created_at', 'desc')->get();

        $res['total'] = Review::where('building_id', $request->building_id)->count();
        // }

        $items->load('building', 'creator');
        $items->transform(function (Review $items) {
            return (new ReviewResource($items));
        });

        $res['items'] = $items;

        return json_encode($res);
    }
}
