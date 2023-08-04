<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UsersController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        DB::table('users')->insert([
            'email' => $request->post('email'),
            'first_name' => $request->post('first_name'),
            'last_name' => $request->post('last_name'),
            'user_name' => $request->post('user_name'),
            'phone_number' => $request->post('phone_number'),
            'role' => $request->post('role'),
            'age' => $request->post('age'),
            'education' => $request->post('education'),
            'occupation' => $request->post('occupation'),
            'interests' => $request->post('interests'),
            'hobbies' => $request->post('hobbies'),
            'bio' => $request->post('bio'),
            'postal_code' => $request->post('postal_code'),
            'address' => $request->post('address'),
            'gender' => $request->post('gender'),
            'password' => Hash::make($request->post('password')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('Users_data');
    }

    public function get_all_users()
    {
        $data = DB::table('users')
            ->where('enable','=',1)
            ->select('email', 'first_name', 'last_name', 'user_name', 'phone_number', 'id')
            ->get();
        return (view('users.usersData')->with(['users' => $data]));
    }

    public function edit_panel_user_data($id)
    {
        $data = DB::table('users')
            ->where(['id' => $id])
            ->first();
        return view('users.editUserMenue', ['user' => $data]);
    }

    public function store_edited_user(Request $request, $id)
    {
        DB::table('users')
            ->where([
                'id' => $id
            ])
            ->update([
                'email' => $request->post('email'),
                'first_name' => $request->post('first_name'),
                'last_name' => $request->post('last_name'),
                'user_name' => $request->post('user_name'),
                'phone_number' => $request->post('phone_number'),
                'role' => $request->post('role'),
                'age' => $request->post('age'),
                'education' => $request->post('education'),
                'occupation' => $request->post('occupation'),
                'interests' => $request->post('interests'),
                'hobbies' => $request->post('hobbies'),
                'bio' => $request->post('bio'),
                'postal_code' => $request->post('postal_code'),
                'address' => $request->post('address'),
                'gender' => $request->post('gender'),
                'updated_at' => now(),
            ]);
        return redirect()->route('Users_data');
    }

    public function delete_user ($id)
    {

        DB::table('users')
            ->where(['id' => $id])
            ->update([
                'enable' => 0,
                'updated_at' => now(),
            ]);
        return redirect()->route('Users_data');
    }
}
