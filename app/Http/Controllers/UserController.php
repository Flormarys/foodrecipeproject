<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 * PHP 7.3.27 
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Validator;

/**
 * The UserController handle the CRUD actions for the user.
 */
class UserController extends Controller
{

    /**
     * Constructor use middleware for auth.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * The edit function allows user edit his own data
     */
    public function edit()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        return view('users.edit')->with('user', $user);
    }

    /**
     * The edit function allows user edit his own data
     */
    public function update(Request $request)
    {
        // 
        $validator = Validator::make(
            $request->all(), [ 
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email',
            'password' => 'required|string|min:8'
            ]
        );
        // updating a user
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->has('newpassword') 
            && $request->has('password_confirmation') 
            && $request->password_confirmation == $request->newpassword 
            && Hash::check($request->password, $user->password)
        ) {
            $user->password = Hash::make($request->newpassword);
            $user->save();
            return redirect('/')->with('success', 'User Updated');
        } else {
            return redirect('/')->with('error', 'Your current password does not match.');
        }
    }

    /**
     * The create function allows new user to create an account
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            ]
        );
        User::create(
            [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]
        );
        return redirect('/')->with('success', 'User created');
    }

    /**
     * The logout function allows users out of the application
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'User Logout');
    }

}
