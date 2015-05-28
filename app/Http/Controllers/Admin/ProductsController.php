<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Http\Requests\ProductImageRequest;

use CodeCommerce\Models\Category;
use CodeCommerce\Models\Product;
use CodeCommerce\Models\ProductImage;
use CodeCommerce\Models\Tag;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

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

    public function create(Product $product, Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('product', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        $params = $request->all();

        $params['featured'] = $request->get('featured', 0);
        $params['recommend'] = $request->get('recommend', 0);

        $product = $this->product->create($params);

        //$product->tags()->sync($this->storeTags($request->input('tag_list')));
        $this->syncTags($product, $params['tag_list']);

        return Redirect::route('products.index')->with('message', trans('app.product_created_with_sucess'));


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

        $params['featured'] = $request->get('featured', 0);
        $params['recommend'] = $request->get('recommend', 0);

        $product = $this->product->find($id);
        $product->update($params);

        $this->syncTags($product, $params['tag_list']);

        return Redirect::route('products.index')->with('message', trans('app.product_updated_with_sucess'));
    }

    public function destroy($id)
    {
        $product = $this->product->find($id);
        $product->tags()->sync([]);
        $product->delete();

        return Redirect::route('products.index')->with('message', trans('app.product_deleted_with_sucess'));
    }
    
    // actions of images
    public function images($id)
    {
        $product = $this->product->find($id);
        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->product->find($id);
        return view('products.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, ProductImage $productImage, $id)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('products.images', ['id' => $id])->with('message', 'Image uploaded with sucess');
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if (file_exists( public_path('uploads/') .  $image->id . '.' . $image->extension)) {
            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id' => $product->id])->with('message', 'Image deleted with sucess');
    }

    // privates
    private function syncTags(Product $product, $tags)
    {
        $tags = explode(',', $tags);
        foreach ($tags as $tag) {
            $tag_id = Tag::firstOrCreate(['name'=> trim($tag)])->id;
            $tag_ids[] =  $tag_id;
        }

        $product->tags()->sync($tag_ids);
    }


}
