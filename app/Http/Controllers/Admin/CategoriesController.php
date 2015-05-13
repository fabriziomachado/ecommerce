<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Models\Category;

class CategoriesController extends Controller {

    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

	public function index()
	{
        $categories = $this->categoryModel->all();

        return view('category.index', compact('categories'));

	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
