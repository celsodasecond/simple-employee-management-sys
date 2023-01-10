<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

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
        return Redirect::route('edit-profile');//->with('success', 'Profile Updated Successfully');
    }
}
