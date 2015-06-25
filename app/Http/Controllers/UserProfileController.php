<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function show(Request $request)
    {

        $user = Auth::user();


        if(!isset($user->profile))
        {
            $profile = new Profile();
            $profile->user()->associate($user);
            $profile->address = 'Address house of '. $user->name;
            $profile->save();
        }

        //dd($user->profile->address);

        return view('user.show', compact('user'));
    }

}
