<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Models\Order;
use CodeCommerce\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{


    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if (!Session::has('cart')) {
            return false;
        }

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0) {


            //DB::transaction( function(){})

            $order = $orderModel->create([ 'user_id' => 1, 'total' => $cart->getTotal() ]);

            foreach ($cart->all() as $k => $item)
            {

                $data = ['product_id' => $k,
                    'price' => $item['price'],
                    'qtd' => $item['qtd']
                ];

                $order->items()->create($data);
            }

            //dd($order->items);

        }
    }

}
