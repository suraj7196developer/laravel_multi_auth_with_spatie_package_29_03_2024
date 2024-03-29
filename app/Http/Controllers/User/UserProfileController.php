<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\User\UserProfileService;
use App\Exceptions\ErrorFoundException;
use Auth;
use File;

class UserProfileController extends Controller
{
    protected $profileservice;

    public function __construct(UserProfileService $profileservice)
    {
        $this->profileservice = $profileservice;
    }

    function index($id)
    {
        return $profile = $this->profileservice->getProfileDetail($id);
    }

    public function update(Request $request, $id)
    {
        $user = $this->profileservice->userProfileUpdate($request, $id);
        return back()->with('info', 'Profile Updated Successfully!');
    }
}
