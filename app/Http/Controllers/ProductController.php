<?php

namespace App\Http\Controllers;

use App\Category;
use App\Firm;
use App\Http\Requests\ProductsCreateRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['firm', 'category'])->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $firms = Firm::orderBy('name', 'asc')->get();

        return view('product.create', compact('categories', 'firms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsCreateRequest $request)
    {
        $product  = Product::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'firm_id' =>  $request->firm,
            'number' =>  $request->number,
            'percent' =>  $request->percent,
            'first_price' =>  $request->first_price,
            'last_price' =>  $request->last_price,
            'date' =>  $request->date
        ]);
        if ($product) {
            return redirect()->back()->with('success', 'Product created successfully');
        }
        return redirect()->back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['firm', 'category'])->find($id);
        if($product){
            return view('product.show', compact('product'));
        }
        return view('error');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $firms = Firm::orderBy('name', 'asc')->get();

        $product = Product::find($id);
        if($product){
            return view('product.edit', compact('product', 'categories', 'firms'));
        }
        return view('error');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = Product::find($id);
        $product->fill($data);
        $save = $product->save();
        if ($save) {
            return redirect()->back()->with('success', 'Product Updated successfully');
        }
        return redirect()->back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::destroy($id);
        $delete = $product->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Product deleted successfully');
        }
        return redirect()->back()->with('error', 'Error');
    }
}
