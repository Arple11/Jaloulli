<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\IranPhoneNumber;
use App\Rules\IranPostalCode;
use App\Rules\UsedEmail;
use App\Rules\UsedUserName;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', new UsedEmail()],
            'first_name' => 'required',
            'last_name' => 'required',
            'user_name' => ['required', new UsedUserName()],
            'phone_number' => ['required', 'numeric',new IranPhoneNumber()],
            'age' => ['required', 'min:18'],
            'postal_code' => ['required', new IranPostalCode()],
            'password' => ['confirmed', 'required', Password::min(8)->numbers()->letters()]
        ]);
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
        User::storeEditedUser($request, $id);
        return redirect()->route('Users_data');
    }

    public function delete_user($id)
    {
        User::destroy($id);
        return redirect()->route('Users_data');
    }

    public function filterUsers(Request $request)
    {
//        dd($request->toArray());
        $user = new User();
        if( !is_null($request->filterEmail) ) {
            $user = $user->where('email', 'like', '%' . $request->filterEmail . '%');
        }

        if( !is_null($request->filterFirstName) ) {
            $user = $user->where('first_name', 'like', '%' . $request->filterFirstName . '%');
        }

        if( !is_null($request->filterLastName) ) {
            $user = $user->where('last_name', 'like', '%' . $request->filterLastName . '%');
        }

        if( !is_null($request->filterUserName) ) {
            $user = $user->where('user_name', 'like', '%' . $request->filterUserName . '%');
        }

        if( !is_null($request->filterPhoneNumber) ) {
            $user = $user->where('phone_number', 'like', '%' . $request->filterPhoneNumber . '%');
        }

        if( !is_null($request->filterAgeMin) ) {
            $user = $user->where('age', '>=', $request->filterAgeMin);
        }

        if( !is_null($request->filterAgeMax) ) {
            $user = $user->where('age', '<=', $request->filterAgeMax);
        }

        if( $request->filterGender != "all" ) {
            $user = $user->where('gender', $request->filterGender);
        }

        if( $request->filterEducation != "all" ) {

            $user = $user->where('education', $request->filterEducation);
        }

        if( !is_null($request->filterPostalCode) ) {
            $user = $user->where('postal_code', 'like', $request->filterPostalCode);
        }

        if( !is_null($request->filterOccupation) ) {
            $user = $user->where('occupation', 'like', $request->filterOccupation);
        }

        if( $request->filterOrderStatus != "all" ) {
            if( $request->filterOrderStatus == "true" ) {
                $user = $user->where(function (Builder $query) {
                    $query->whereHas('ordersSold')
                        ->orwherehas('ordersBought');
                });
            } else if( $request->filterOrderStatus == "false" ) {
                $user = $user->where(function (Builder $query) {
                    $query->whereDoesntHave('ordersSold')
                        ->WhereDoesntHave('ordersBought');
                });
            }
        }

        if( $request->filterFactorStatus != "all" ) {
            if( $request->filterFactorStatus == "true" ) {
//                $user = $user->where(function (Builder $query) {});
            } else if( $request->filterFactorStatus == "false" ) {
//                $user = $user->where(function (Builder $query) {});
            }
        }

        if( !is_null($request->filterOrderCountMin) ) {
            $user = $user->whereHas('ordersBought', function (Builder $query) {
                return $query;
            }, '>=', $request->filterOrderCountMin)
                ->orWhereHas('ordersBought', function (Builder $query) {
                    return $query;
                }, '>=', $request->filterOrderCountMin);
        }

        if( !is_null($request->filterOrderCountMax) ) {
            $user = $user->whereHas('ordersBought', function (Builder $query) {
                return $query;
            }, '<=', $request->filterOrderCountMax)
                ->orWhereHas('ordersBought', function (Builder $query) {
                    return $query;
                }, '<=', $request->filterOrderCountMax);
        }

        if( $request->filterRole != "all" ) {
            $user = $user->where('role_id', $request->filterRole);
        }

        // TODO add total Order filter

        $user = $user->paginate(10);
        return view('users.usersData')->with(['users' => $user]);

    }
}
