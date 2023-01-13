<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function edit()
    {
        return Inertia::render('Users/EditUser', [
            'user' => auth()->user()
        ]);
    }

    public function update(UserRequest $request)
    {
        auth()->user()->update($request->all());
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(100,100)->save(public_path('storage/' . $filename));
            auth()->user()->image = $filename;
            auth()->user()->save();
        }
        return Redirect::route('edit-profile');//->with('success', 'Profile Updated Successfully');
    }
}
