<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

class InfoUserController extends Controller
{

    public function create()
    {
        return view('laravel-examples/user-profile');
    }

public function updateProfileImage(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
    ]);

    $avatar = $request->file('avatar');
    $extension = $avatar->getClientOriginalExtension();
    $filename = 'avatar_' . time() . '.' . $extension;
    $destinationPath = 'assets/img/';

    if ($user->avatar && $user->avatar != 'default.jpg') {
        $oldFilePath = public_path($destinationPath . $user->avatar);
        if (File::exists($oldFilePath)) {
            File::delete($oldFilePath);
        } else {
            Log::error('File not found for deletion: ' . $oldFilePath);
        }
    }

    try {
        $avatar->move(public_path($destinationPath), $filename);
    } catch (\Exception $e) {
        Log::error('Error uploading file: ' . $e->getMessage());
        return redirect('/user-profile')->withErrors('Error updating profile image.');
    }

    $user->update(['avatar' => $filename]);

    return redirect('/user-profile')->with('success', 'Profile updated successfully');
}

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone'     => ['max:50'],
            'location' => ['max:70'],
            'about_me'    => ['max:150'],
        ]);
        if($request->get('email') != Auth::user()->email)
        {
            if(env('IS_DEMO') && Auth::user()->id == 1)
            {
                return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
                
            }
            
        }
        else{
            $attribute = request()->validate([
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            ]);
        }
        
        
        User::where('id',Auth::user()->id)
        ->update([
            'name'    => $attributes['name'],
            'email' => $attribute['email'],
            'phone'     => $attributes['phone'],
            'location' => $attributes['location'],
            'about_me'    => $attributes["about_me"],
        ]);


        return redirect('/user-profile')->with('success','Profile updated successfully');
    }
}
