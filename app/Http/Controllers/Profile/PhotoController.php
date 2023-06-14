<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePhotoRequest;

class PhotoController extends Controller
{
    public function update(UpdatePhotoRequest $request)
    {
        //store photo
        //storing of the requested photo in the photos directory 
        $path = $request->file('photo')->store('photos');

        auth()->user()->update(['photo'=>storage_path('app')."/path"]);

        return redirect(Route('profile.edit'))->with([
            'message'=>'Profile picture changes succesfully'
        ]);
        
        
    }
}


