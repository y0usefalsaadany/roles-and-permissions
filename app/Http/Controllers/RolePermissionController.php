<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use App\Models\Role;

class RolePermissionController extends Controller
{
    public function store(PermissionRequest $request)
    {
        $role = Role::find($request->role_id);
        $role->permissions()->attach($request->permissions);
        return response()->json([
            "message"=>"success"
        ]);
    }
}
