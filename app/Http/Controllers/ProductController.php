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
            'date' =>  $request->date,
            'description' =>  $request->description
        ]);
        if ($product) {
            session(['firm' => $request->firm]);
            session(['category' => $request->category]);
            session(['date' => $request->date]);

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
        $product = Product::find($id);
        if ($product) {
            $delete = $product->delete();
            if ($delete) {
                return redirect()->back()->with('success', 'Product deleted successfully');
            }
        }

        return redirect()->back()->with('error', 'Error');
    }
    public function daySum(Request $request)
    {
        $sum = [];
        $day = $request->day;
        $products = Product::where('date', $day)->get();
        if (count($products)) {
            $day_first_price_sum = [];
            $day_last_price_sum = [];
            foreach($products as $product){
                $sum['day_first_price_list'][] = $product->name . ' = ' . $product->first_price.'դր' . ' * ' . $product->number;
                $sum['day_last_price_list'][] = $product->name . ' = ' .$product->last_price.'դր' . ' * ' . $product->number;
                $day_first_price_sum[] = $product->first_price * $product->number;
                $day_last_price_sum[] = $product->last_price * $product->number;
            }

            $sum['day_first_price_sum'] = array_sum($day_first_price_sum);
            $sum['day_last_price_sum'] = array_sum($day_last_price_sum);

            return view('sum.day',compact('sum','day'));
        }
        else{
            $error = 'not found';
            return view('sum.day',compact('day','error'));
        }
    }

    public function manyDaySum(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $sum_month = [];
        $products = Product::whereBetween('date', [$from, $to])->orderBy('date')->get();
        if (count($products)) {
            $day_first_price_sum = [];
            $day_last_price_sum = [];
            foreach($products as $product){
                $sum_month['day_first_price_list'][] = $product->name . ' = ' . $product->first_price.'դր' . ' * ' . $product->number . ' | ' . $product->date;
                $sum_month['day_last_price_list'][] = $product->name . ' = ' .$product->last_price.'դր' . ' * ' . $product->number . ' | ' . $product->date;
                $day_first_price_sum[] = $product->first_price * $product->number;
                $day_last_price_sum[] = $product->last_price * $product->number;
            }

            $sum_month['day_first_price_sum'] = array_sum($day_first_price_sum);
            $sum_month['day_last_price_sum'] = array_sum($day_last_price_sum);

            return view('sum.month',compact('sum_month','from','to'));
        }
        else{
            $error = 'not found';
            return view('sum.month',compact('from','to','error'));
        }
    }
}
