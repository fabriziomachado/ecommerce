<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Models\Category;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller {

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

	public function index()
	{
        $categories = $this->category->all();

        return view('categories.index', compact('categories'));

	}

	public function create()
	{
        return view('categories.create', compact('categories'));
	}

	public function store(Request $request)
	{
		$params = $request->all();
        $this->category->create($params);

        return Redirect::route('categories.index')->with('message', trans('app.category_created_with_sucess') );
	}

	public function show($id)
	{
		$category = $this->category->find($id);

        return view('categories.show', compact('category'));

	}

	public function edit($id)
	{
        $category = $this->category->find($id);

        return view('categories.edit', compact('category'));
	}

	public function update(Request $request, $id)
	{
        $params = $request->all();
        $this->category->find($id)->update($params);

        return Redirect::route('categories.index')->with('message', trans('app.category_updated_with_sucess') );
	}

	public function destroy($id)
	{
        $this->category->find($id)->delete();

        return Redirect::route('categories.index')->with('message', trans('app.category_deleted_with_sucess') );

    }

}
