<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Http\Requests;
use CodeCommerce\Models\Category;
use CodeCommerce\Models\Order;
use CodeCommerce\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Items\Item;

class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService)
    {
        if (!Session::has('cart')) {
            return false;
        }

        $categories = Category::all();


        $cart = Session::get('cart');

        if ($cart->getTotal() > 0) {

            // inicia uma comunicacao com o pagseguro
            $checkout = $checkoutService->createCheckoutBuilder();
            //DB::transaction( function(){})
            $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal()]);
            $checkout->setReference($order->id);
            $checkout->setRedirectTo("http://ecommerce.app/account/orders/". $order->id);

            foreach ($cart->all() as $k => $item) {


                $data = ['product_id' => $k,
                    'price' => $item['price'],
                    'qtd' => $item['qtd']
                ];

                // adiciona itens ao carrinho do pagseguro
                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2, ".", ""), $item['qtd']));

                $order->items()->create($data);
            }

            $cart->clear();

            event(new CheckoutEvent(Auth::user(), $order));


            $response = $checkoutService->checkout($checkout->getCheckout());

            //$pagseguro_trans_id = $response->getCode();
            //$order->update(['pagseguro_trans_id' => $pagseguro_trans_id]);
            ////dd($order);


            //return view('store.checkout', compact('cart', 'order', 'categories'));
            //return redirect()->route('account.orders')->with('message', 'Order #'. $order->id  .' created with sucess');
            return redirect($response->getRedirectionUrl());

        }

        return view('store.checkout', ['cart' => 'empty', 'categories' => $categories]);
    }


    // teste de integracao com pagseguro
    // https://github.com/wesleywillians/laravel-pagseguro
    public function test(CheckoutService $checkoutService)
    {
        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        return redirect($response->getRedirectionUrl());

    }


//    public function transaction(Order $order)
//    {
//        $pagseguro_trans_id = Input::get('pagseguro_trans_id', false);
//        echo($pagseguro_trans_id);
//
//        $order = $order->find()
//    }

}
