<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     * @throws \Exception
     */
    public function search(Request $request)
    {
        // Remove flash session fields before from visited
        if (!empty(request()->old())) {
            $this->flashReset();
        }

        return DataTables::of(Category::latest())->addColumn('action', function($category){
            return '<a href="'.route('admin.category.edit', $category->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>'.
                   '<a href="'.route('admin.category.delete', $category->id).'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>';
        })->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Show form edit
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        // Save detail to session
        if (empty(request()->old()) || old('id') != $id) {
            $this->flashSession($category);
        }

        return view('admin.category.edit');
    }

    /**
     * @param \App\Http\Requests\StoreCategoryRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function store(StoreCategoryRequest $request)
    {
        $id = $request->input('id', 0);
        if (!$id) {
            Category::create($request->toArray());

            return redirect()->route('admin.category')->with('message', 'Category created!');
        }

        $category = Category::findOrFail($id);
        $category->update($request->toArray());

        return redirect()->back()->with('message', 'Category updated!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with('message', 'Category removed: ' . $category->name);
    }
}
