<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersData;


class UserController extends Controller
{
    //
    public function registerForm() {
        return view('register');
    }

    public function createUser(Request $request) {
        $request->validate([
            'fullName' => 'required',
            'emailAddress' => 'required | email',
            'password' => 'required',
            'confirmPass' => 'required',
        ]);

        $userData = new UsersData();
        $userData->name = $request['fullName'];
        $userData->email = $request['fullName'];
        $userData->password = $request['fullName'];
        $userData->save();
        return redirect('/register');
    }

    public function viewUser()  {
        $data = UsersData::all();
        $userData = compact('data');
        return view('viewUsers')->with($userData);
    }

    public function deleteUser(Request $request, $id) {
        $user = UsersData::find($id);

        if (!$user) {
            // Handle if the user with the given ID is not found
            return redirect('/view/students')->with('error', 'User not found.');
        }

        $user->delete();

        return redirect('/view/students')->with('success', 'User deleted successfully.');
    }

    public function updateUser(Request $request, $id) {
        $user = UsersData::find($id);
        if (!$user) {
            // Handle if the user with the given ID is not found
            return redirect('/view/students')->with('error', 'User not found.');
        }
        return view('update');
    }
}
