<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File; // Add this at the top of your controller
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $users = User::all();
        return view('laravel-examples/user-management', compact('users'));
    }

    // Store a newly created resource in storage.
public function store(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:8',
        'about_me' => 'nullable|max:1000',
        'role' =>  'nullable|max:50',
        'phone' => 'nullable|max:255',
        'location' => 'nullable|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $extension = $avatar->getClientOriginalExtension();
        // Create filename
        $filename = 'avatar_' . time() . '.' . $extension;
        // Upload avatar
    $destinationPath = public_path('assets/img');
    $avatar->move($destinationPath, $filename);
    $path=$filename;
    } else {
        // Set a default avatar or leave it empty
        $path = 'team-3.jpg';
    }

    // Create the user
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->about_me = $validatedData['about_me'];
        $user->role = $validatedData['role'];
    $user->phone = $validatedData['phone'];
    $user->location = $validatedData['location'];
    $user->avatar = $path;

    // Save the user
    $user->save();

    // Redirect or return a response
    return redirect()->route('user-management.index')->with('success', 'User created successfully.');
}

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $attributes = $request->validate([
            'name' => 'required|max:50',
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore($user->id)],
            'about_me' => 'required|max:50',
            'role' => 'required|max:50',

            // Add other fields as necessary
        ]);

        $user->update($attributes);

        return redirect()->route('user-management.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Add any specific logic you need for deleting the user
        // For example, check if the user can be deleted or if they own resources that need to be handled

       if ($user->avatar && $user->avatar!="default.jpg" && File::exists(public_path('assets/img/' . $user->avatar))) {
        // Delete the avatar file
        File::delete(public_path('assets/img/' . $user->avatar));
    }

    // Now delete the user
    $user->delete();
        return redirect()->route('user-management.index')->with('success', 'User deleted successfully.');
    }
}
