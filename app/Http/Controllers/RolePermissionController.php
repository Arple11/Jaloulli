<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\JsonResponse;

class RolePermissionController extends Controller
{
    public function role_index(){
        $roles = Role::all();
        return response()->json($roles);
    }
    public function role_store(Request $request){
        $request->validate([
            "name" => 'required|string|max:255',
        ]);
        Role::create($request->all());
        return response()->json("success.");
    }
     public function role_show($id){
        $role = Role::find($id);
        return response()->json($role);
     }

     public function role_update(Request $request, $id){
        $role = Role::find($id);
        $role -> update($request->all());
        $role -> save();
        return response()->json($role);
     }

     public function role_destroy($id){
        $role = Role::find($id);
        $role -> delete();
        return response() -> json($role);
     }
     public function permission_index(){
        $permissions = Permission::all();
        return response()->json($permissions);
     }

     public function permission_store(Request $request){
        $request -> validate([
            "name" => 'required|string|max:255'
        ]);
        Role::create($request->all());
        return response() -> json("success");
     }

     public function permission_show($id){
        $permission = Permission::find($id);
        return response()->json($permission);
     }

     public function permission_update(Request $request, $id){
        $permission = Permission::find($id);
        $permission -> update($request->all());
        $permission -> save();
        return response()->json($permission);
     }

     public function permission_destroy($id){
        $permission = Permission::find($id);
        $permission -> delete();
        return response() -> json($permission);
     }
}