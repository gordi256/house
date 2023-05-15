<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User};
use App\Http\Resources\Api\{UserResource};

class UserController extends Controller
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

            $items = User::with('roles')->search($request->search)->orderBy('id', 'asc')->get();
            $res['total'] = $items->count();
        } else {
            $items = User::with('roles')->offset($offset)->limit($limit)->orderBy('id', 'asc')->get();

            $res['total'] = User::count();
        }
        $items->transform(function (User $items) {
            return (new UserResource($items));
        });

        $res['items'] = $items;

        return json_encode($res);
    }
}
