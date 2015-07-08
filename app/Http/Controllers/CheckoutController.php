<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Http\Requests;
use CodeCommerce\Models\Category;
use CodeCommerce\Models\Order;
use CodeCommerce\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Items\Item;

class CheckoutController extends Controller
{

    //1	Aguardando pagamento: o comprador iniciou a transação, mas até o momento o PagSeguro não recebeu nenhuma informação sobre o pagamento.
    //2	Em análise: o comprador optou por pagar com um cartão de crédito e o PagSeguro está analisando o risco da transação.
    //3	Paga: a transação foi paga pelo comprador e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento.
    //4	Disponível: a transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta.
    //5	Em disputa: o comprador, dentro do prazo de liberação da transação, abriu uma disputa.
    //6	Devolvida: o valor da transação foi devolvido para o comprador.
    //7	Cancelada: a transação foi cancelada sem ter sido finalizada.
    //8	Chargeback debitado: o valor da transação foi devolvido para o comprador.
    //9	Em contestação: o comprador abriu uma solicitação de chargeback junto à operadora do cartão de crédito.

    private $status_transaction;

    public function __construct()
    {
        // $this->middleware('auth');

        $this->status_transaction = [ 1 => 'Aguardando pagamento', 2 => 'Em análise', 3 => 'Paga',  7 => 'Cancelada'];

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
            $checkout->setRedirectTo("http://ecommerce.app/account/orders/" . $order->id);

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


    public function notifications(Locator $locator)
    {
        //dd($locator);

        $orderId = $transaction->getDetails()->getReference();

        $order = Order::find($orderId);
        $order->update(['pagseguro_trans_id' => $pagseguro_trans_id]);

        $transaction = $locator->getByCode('B38D2405A8DA4266BF87A6A87CAC0A88');
       // echo $transaction->getDetails();
        //echo $transaction->getDetails();
        $details = $transaction->getDetails();
        dd($details->getStatus());



            $purchase = $locator->getByNotification($_POST['notificationCode']);

            var_dump($purchase); // Exibe na tela a transação ou assinatura atualizada

    }

}
