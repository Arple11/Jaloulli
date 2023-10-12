<?php

namespace App\Http\Controllers;

use App\Jobs\RegisterEmailJob;
use App\Models\Order;
use App\Models\User;
use App\Rules\IranPhoneNumber;
use App\Rules\IranPostalCode;
use App\Rules\UsedEmail;
use App\Rules\UsedUserName;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required',
            'national_id' => 'required',
            'password' => 'required|string|min:8',
        ]);
        User::create($request->all());
        return response()->json("success.");
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json("Deleted.");
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $user = User::find($id);
       return response()->json($user);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $user = User::find($id);
        $user->update($request->all());
        $user->save();
        return response()->json("updated");
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}