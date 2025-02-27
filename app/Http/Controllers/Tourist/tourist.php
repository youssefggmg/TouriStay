<?php

namespace App\Http\Controllers\Tourist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\announcmentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class tourist extends Controller
{
    public function index($perpage = 4)
    {
        $user = Auth::user();
        $announcments = announcmentModel::paginate($perpage);
        return view("tourist.home", compact("announcments", "user"));
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        $search = $request->input("search");
        $search = $request->input('search');

        $query = announcmentModel::query();

        if (is_numeric($search)) {
            $query->where('price', $search);
        } elseif (strtotime($search)) {
            $query->where('disponibility', $search);
        } else {
            $query->where('city', 'ILIKE', "%$search%");
        }

        $announcments = $query->get();
        return view("tourist.search", compact("announcments", "user"));
    }
    public function profile()
    {
        $user = Auth::user();

        return view("tourist.profile", compact('user'));
    }
    public function editForm()
    {
        $user = Auth::user();
        return view("tourist.editform", compact('user'));
    }
    public function updateUserInfo(Request $request)
    {
        // Validation rules
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'current_password' => 'string|min:6',
            'new_password' => 'string|min:6',
            'confirm_password' => 'string',
        ]);


        if ($request->current_password) {
            // Check if the current password is correct
            if (!Hash::check($request->current_password, $request->user()->password)) {
                return Redirect::back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
            // check if the new passwords are the same
            if ($request->new_password !== $request->confirm_password) {
                return Redirect::back()->withErrors(['confirm_password' => 'The new password and confirm password are not th same.']);
            }
        }

        // Update user information
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        // Update password if provided
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        // Save the updated user
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profile updated successfully!');
    }
}
