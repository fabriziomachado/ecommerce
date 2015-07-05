<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;

class AccountController extends Controller {


    public function __construct()
    {

    }


    public function orders(Locator $locator, Order $order)
    {

        $pagseguro_trans_id = Input::get('pagseguro_trans_id', false);

        $transaction = $locator->getByCode($pagseguro_trans_id);
        $orderId = $transaction->getDetails()->getReference();

        $order = Order::find($orderId);
        $order->update(['pagseguro_trans_id' => $pagseguro_trans_id]);

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
