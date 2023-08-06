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
        return (view('users.usersData')->with(['users' => User::getAllUsers()]));
    }

    public function edit_panel_user_data($id)
    {
        return view('users.editUserMenue', ['user' => User::find($id)]);
    }

    public function store_edited_user(Request $request, $id)
    {
        User::storeEditedUser($request,$id);
        return redirect()->route('Users_data');
    }

    public function delete_user($id)
    {
        User::destroy($id);
        return redirect()->route('Users_data');
    }
}
