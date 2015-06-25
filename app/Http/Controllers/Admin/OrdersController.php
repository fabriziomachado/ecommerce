<?php namespace CodeCommerce\Http\Controllers\Admin;



use CodeCommerce\Http\Requests;
use CodeCommerce\Models\Order;
use CodeCommerce\Models\OrderItem;
use CodeCommerce\User;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class OrdersController extends Controller
{

    protected $orders;

    public function __construct(Order $order)
    {
        $this->orders = $order;
    }


    public function index()
    {
        $orders = $this->orders->with('user')->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }


    public function update_status($id, $status_id)
    {

        $this->orders->find($id)->update(['status'=> $status_id] );

        return Response::json(['message' => 'Update status Order with success'], 200);
    }


}