<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    // Method to update the user's avatar
    public function update(UpdateAvatarRequest $request){

        // Store the new avatar in the 'avatars' directory within the public disk
        $path = Storage::disk("public")->put("avatars", $request->file("avatar"));

        // Check if the user already has an avatar set and it's not the default avatar
        if($request->user()->avatar){
            if($request->user()->avatar != "images/avatar.jpg"){
                // Delete the old avatar from storage
                Storage::disk("public")->delete($request->user()->avatar);
            }
        }

        // Update the user's avatar path in the database
        $request->user()->update(['avatar'=>$path]);

        // Flash a success message to the user
        flash()->options(['timeout' => 5000, 'position' => 'top-center',])->success('Avatar Updated Successfully.');

        // Redirect the user back to the previous page
        return back();
    }
}
