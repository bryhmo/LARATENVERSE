<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePhotoRequest;

class PhotoController extends Controller
{
    public function update(UpdatePhotoRequest $request)
    {
       
        dd($request->all());
        //dd($request->input('_token'));


        //store photo
        return redirect(Route('profile.edit'));
        //return back()->with(['message' => 'Profile picture changed successfully']);
    }
}

