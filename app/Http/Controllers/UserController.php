<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'email is required',
            'email.email' => 'Please enter valid email',
            'password.required' => 'password is required'

        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Email or Password is incorrect');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'You have been logged out');
    }

    public function registeruser(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|min:4|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 4 characters',
            'name.max' => 'Name must be at most 15 characters',
            'email.required' => 'email is required',
            'email.email' => 'Please enter valid email',
            'email.unique' => 'Email already exists',
            'password.required' => 'password is required',
            'password.confirmed' => 'password does not match',
            'password.min' => 'password must be at least 8 characters',
            'password_confirmation.required' => 'Confirm password is required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if ($user->save()) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('home')->with('success', 'You have been registered successfully');
            }
        } else {
            return redirect()->route('register')->with('error', 'Something went wrong');
        }
    }

    public function profile()
    {
        $posts = Auth::user()->posts;
        $comments = Auth::user()->comments;
        return view('profile', compact('posts', 'comments'));
    }

    public function changepassword(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required | min:8',
            'new_password' => 'required | confirmed | min:8',
            'new_password_confirmation' => 'required',
        ], [
            'current_password.required' => 'Current password is required',
            'current_password.min' => 'password must be at least 8 characters',
            'new_password.required' => 'New password is required',
            'new_password.confirmed' => 'New password does not match',
            'new_password.min' => 'New password must be at least 8 characters',
            'new_password_confirmation.required' => 'Confirm password is required',
        ]);
        // dd($user);  
        $user = auth()->user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = $request->new_password;
            if ($user->save()) {
                return redirect()->route('profile')->with('success', 'Password changed successfully.');
            } else {
                return redirect()->route('profile')->with('error', 'Something went wrong.');
            }
        } else {
            return redirect()->route('profile')->with('error', 'Current password is incorrect');
        }
    }

    // public function test()
    // {
        // $user = new User();
        // $user->name = 'Test User 3';
        // $user->email = 'jaydeep@gmail.com';
        // $user->password = 'password';
        // $user->save();

        // $user=User::find(2);
        // $user->password=11111111;
        // $user->save();
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (User::findOrFail(auth()->id())->delete()) {
            return redirect()->route('home')->with('success', 'User deleted successfully');
        }
    }
}
