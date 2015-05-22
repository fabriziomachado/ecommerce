<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use CodeCommerce\Models\Product;
use CodeCommerce\Models\Category;

class ProductsController extends Controller {

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

	public function index()
	{
        $products = $this->product->all();

        return view('products.index', compact('products'));
	}

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('categories'));
    }

	public function store(Request $request)
	{
        $params = $request->all();

        $params['featured'] = array_key_exists('featured', $params)?:'0';
        $params['recommend'] = array_key_exists('recommend', $params)?:'0';

        $this->product->create($params);

        return Redirect::route('products.index')->with('message', trans('app.product_created_with_sucess') );


	}

	public function show($id)
	{
		//
	}

	public function edit($id, Category $category)
	{
        $product = $this->product->find($id);
        $categories = $category->lists('name', 'id');

        return view('products.edit', compact('product', 'categories'));
	}

	public function update(Request $request, $id)
	{
        $params = $request->all();

        $params['featured'] = array_key_exists('featured', $params)?:'0';
        $params['recommend'] = array_key_exists('recommend', $params)?:'0';

        $this->product->find($id)->update($params);

        return Redirect::route('products.index')->with('message', trans('app.product_updated_with_sucess') );
    }

	public function destroy($id)
	{
        $this->product->find($id)->delete();

        return Redirect::route('products.index')->with('message', trans('app.product_deleted_with_sucess') );
	}

}
