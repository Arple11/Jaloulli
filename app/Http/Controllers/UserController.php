<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        User::create($request->all());
        return redirect()->route('Users_data');
    }

    public function get_all_users()
    {
        $data = User::whereEnable(1)
            ->select('email', 'first_name', 'last_name', 'user_name', 'phone_number', 'id')
            ->get();
        return (view('users.usersData')->with(['users' => $data]));
    }

    public function edit_panel_user_data($id)
    {
        $data = User::find($id);
        return view('users.editUserMenue', ['user' => $data]);
    }

    public function store_edited_user(Request $request, $id)
    {
        $data = $request->all();

        /*
         * removing the token
         */
        array_shift($data);

        User::find($id)->update($data);

        return redirect()->route('Users_data');
    }

    public function delete_user($id)
    {
        User::find($id)->update([
            'enable' => 0,
        ]);
        return redirect()->route('Users_data');
    }
}
