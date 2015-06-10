<?php namespace CodeCommerce\Http\Controllers;


use Illuminate\Contracts\Routing\ResponseFactory;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use CodeCommerce\Http\Requests;

use CodeCommerce\Models\Product;
use CodeCommerce\Models\Cart;

class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        if (!Session::has('cart')) {
            Session::set('cart', $this->cart);
        }

        return view('store.cart', ['cart' => Session::get('cart')]);
    }


    public function add($id)
    {
        $cart = $this->getCart();

        $product = Product::find($id);

        $cart->add($id, $product->name, $product->price, $product->images->first()->photo);
        Session::set('cart', $cart);

        return redirect()->route('cart');
    }


    public function destroy($id)
    {
        $cart = $this->getCart();
        $cart->remove($id);
        Session::set('cart', $cart);
        return redirect()->route('cart');
    }

    public function update($id, $qtd)
    {
        $cart = $this->getCart();

        $product = Product::find($id);
        $cart->update($id, $product->name, $product->price, $product->images->first()->photo, $qtd);

        $total_item = number_format($product->price * $qtd, 2, ',', '.');
        $total_cart = number_format($cart->getTotal(), 2, ',', '.');
        Session::set('cart', $cart);


        return  Response::json(['item_id' => $id, 'total_item' => $total_item, 'total_cart' => $total_cart ], 200);
    }

    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }

}