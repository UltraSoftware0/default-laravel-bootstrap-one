<?php

namespace App\Http\Controllers\RolesAndPermissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function getAllRoles(){
        return response()->json([
            'roles' => Role::query()->select(['id','name'])->get()
        ],200);
    }
}
