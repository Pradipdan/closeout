<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\HomeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    // public function update(Request $request)
    // {
    //     $user = Auth::user();

    //     $request->validate([
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,' . $user->id,
    //         'phone_no' => 'nullable|string|max:20',
    //     ]);

    //     $user->update($request->only('first_name', 'last_name', 'email', 'phone_no'));

    //     return back()->with('success', 'Profile updated successfully.');
    // }
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_no' => 'nullable|string|max:20',
            // 'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validate image upload if needed
        ]);

        $data = $request->only('first_name', 'last_name', 'email', 'phone_no');

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_image', $fileName, 'public');

            $data['profile_image'] = $filePath;
        }

        // Update user data
        $user->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Incorrect current password.']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        Auth::logout();
        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
