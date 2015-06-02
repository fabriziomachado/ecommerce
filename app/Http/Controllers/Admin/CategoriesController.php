<?php namespace CodeCommerce\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests\CategoryRequest;

use CodeCommerce\Models\Category;

class CategoriesController extends Controller {

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

	public function index()
	{
        $categories = $this->category->paginate(10);

        return view('categories.index', compact('categories'));

	}

	public function create(Category $category)
	{
        return view('categories.create', compact('categories'));
	}

	public function store(CategoryRequest $request)
	{
		$params = $request->all();
        $this->category->create($params);

        return Redirect::route('categories.index')->with('message', trans('app.category_created_with_sucess') );
	}

	public function show($id)
	{
		$category = $this->category->find($id);

        return view('categories.show', compact('categories'));

	}

	public function edit($id)
	{
        $category = $this->category->find($id);

        return view('categories.edit', compact('categories'));
	}

    public function update(CategoryRequest $request, $id)
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
