<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Show list products
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.product.index');
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

        return DataTables::of(Product::latest()) ->addColumn('action', function($product){
            return '<a href="'.route('admin.product.edit', $product->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>'.
                   '<a href="'.route('admin.product.delete', $product->id).'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>';
        })->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.product.create', ['categories' => Category::all()]);
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
        $product = Product::findOrFail($id);
        // Save detail to session
        if (empty(request()->old()) || old('id') != $id) {
            $this->flashSession($product);
        }

        return view('admin.product.edit', ['product' => $product, 'categories' => Category::all()]);
    }

    /**
     * @param \App\Http\Requests\StoreProductRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $id = $request->input('id', 0);

        $productData = $request->except('image');
        if ($request->hasFile('image')) {
            $productData['image'] = $request->image->store('product');
        }

        if (!$id) {
            Product::create($productData);

            return redirect()->route('admin.product')->with('message', 'Product created!');
        }

        /**
         * Update product
         */
        $product = Product::findOrFail($id);
        $product->update($productData);

        return redirect()->back()->with('message', 'Product updated!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->back()->with('message', 'Product removed: ' . $product->name);
    }
}
