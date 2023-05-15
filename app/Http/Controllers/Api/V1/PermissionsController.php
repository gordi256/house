<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PermissionAdminListResource;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    public function index(Request $request)
    {
        $res = array();

        // if ($request->filled('search')) {
        //     $inventory = Role::findByName($request->search);
        //     // $inventory = Role::findByName($request->search) ->get();

        //     // $inventory->toArray();
        //     $inventory->transform(function (Role $inventory) {
        //         return (new RoleAdminListResource($inventory));
        //     });
        //     $res['total'] = $inventory->count();
        //     $res['items'] = $inventory;
        //     return json_encode($res);
        // }
        $offset = 0; // start row index.
        $limit = 10; // no of records to fetch/ get .
        if ($request->filled('offset')) {
            $offset = $request->offset;
        }
        if ($request->filled('limit')) {
            $limit = $request->limit;
        }
        $res = array();

        // $inventory = Role::offset($offset)->limit($limit)->all();

        $inventory = Permission::offset($offset)->limit($limit)->orderBy('id', 'asc')->get();

        $inventory->transform(function (Permission $inventory) {
            return (new PermissionAdminListResource($inventory));
        });
        $res['total'] = Permission::count();
        $res['items'] = $inventory;
        return json_encode($res);
    }
}
