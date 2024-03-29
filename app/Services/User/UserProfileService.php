<?php

namespace App\Services\User;
use App\Models\User;
use App\Exceptions\ErrorFoundException;
use Illuminate\Http\Request;
use Auth;
use File;
use Input;

class UserProfileService
{
	public function getProfileDetail($id){
		return view('userdashboard.profile.index');
	}

	public function userProfileUpdate(Request $request, $id){

		$request->validate([
            'name' => 'required',
            'number' => 'digits:10|regex:/^([0-9\s\-\+\(\)]*)$/'
        ]);

        $user = User::whereId($id)->firstOrFail();

        if($request->has('profile_photo')){
            $destination = $user->profile_photo_path;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $image = $request->file('profile_photo');
            $profile_photo_image = strtolower(str_replace(' ','_',$request->name)). date('Ymd') . '_' . $request->profile_photo->getClientOriginalName();
            $profile_photo_path = $request->file('profile_photo')->storeAs('profile-photos', $profile_photo_image, 'public');
            $request->profile_photo->move(public_path('profile-photos'), $profile_photo_image);
            $user->profile_photo = $profile_photo_image;
            $user->profile_photo_path = $profile_photo_path;
            $user->name = $request->name;
            $user->number = $request->number;
            $user->description = $request->description;
        }else{
            $user->name = $request->name;
            $user->number = $request->number;
            $user->description = $request->description;
        }

        $user->save();
        return back()->with('info', 'Profile Updated Successfully!');
	}
}