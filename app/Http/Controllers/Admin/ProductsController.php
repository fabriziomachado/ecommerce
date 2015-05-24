<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests\ProductRequest;

use CodeCommerce\Models\Category;
use CodeCommerce\Models\Product;

use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller {

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

	public function index()
	{
        $products = $this->product->paginate(10);

        return view('products.index', compact('products'));
	}

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('categories'));
    }

	public function store(ProductRequest $request)
	{
        $params = $request->all();

        $params['featured'] = $request->get('featured',0);
        $params['recommend'] = $request->get('recommend', 0);

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

	public function update(ProductRequest $request, $id)
	{
        $params = $request->all();

        $params['featured'] = $request->get('featured',0);
        $params['recommend'] = $request->get('recommend', 0);

        $this->product->find($id)->update($params);

        return Redirect::route('products.index')->with('message', trans('app.product_updated_with_sucess') );
    }

	public function destroy($id)
	{
        $this->product->find($id)->delete();

        return Redirect::route('products.index')->with('message', trans('app.product_deleted_with_sucess') );
	}

}
