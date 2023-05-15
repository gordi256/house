<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\RoleAdminListResource;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use Illuminate\Http\Request;

class RolesController extends Controller
{

    public function index(Request $request)
    {
        $res = array();
        $inventory = Role::all();

        $inventory->transform(function (Role $inventory) {
            return (new RoleAdminListResource($inventory));
        });
        $res['total'] = Role::count();
        $res['items'] = $inventory;
        return json_encode($res);
    }
}
