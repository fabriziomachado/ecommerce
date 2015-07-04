<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller {


    public function __construct()
    {

    }


    public function orders()
    {


        //$items = [];
        //$auth = $this->auth->User();
        $orders =  Auth::user()->orders; // $auth->orders()->orderBy('created_at', 'desc')->get();
//        if(count($orders))
//        {
//            $items = $orders->first()->items()->get();
//        }
        return view('store.orders', compact( 'orders'));
    }

}
