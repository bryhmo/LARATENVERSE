<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePhotoRequest;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function update(UpdatePhotoRequest $request)
    {
        //store photo
        //storing of the requested photo in the photos directory
        //storing the photo path in the users table of our database 
       // $path = $request->file('photo')->store('photos','public');
        $path = Storage::disk('public')->put('photos', $request->file('photo'));
        if($OldPhoto = $request->user()->photo){
            Storage::disk('public')->delete($OldPhoto);
        }
        auth()->user()->update(['photo'=>$path]);
        
        return redirect(Route('profile.edit'))->with([
            'message'=>'Profile picture changes succesfully'
        ]);
        
        
    }
}


