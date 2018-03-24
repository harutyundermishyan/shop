<?php

namespace App\Http\Controllers;

use App\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firms = Firm::with('products')->get();
        return view('firm.index', compact('firms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('firm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $firm  = Firm::create([
            'name' => $request->name,
        ]);
        if ($firm) {
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
        $firm = Firm::with('products')->find($id);
        if($firm){
            return view('firm.show', compact('firm'));
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
        $firm = Firm::find($id);
        if($firm){
            return view('firm.edit', compact('firm'));
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
        $firm = Firm::find($id);
        $firm->fill($data);
        $save = $firm->save();
        if ($save) {
            return redirect()->back()->with('success', 'Firm Updated successfully');
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
        $firm = Firm::find($id);
        if($firm){
            $delete = $firm->delete();
            if ($delete) {
                return redirect()->back()->with('success', 'Firm Deleted successfully');
            }
            return redirect()->back()->with('error', 'Error');
        }
        return redirect()->back()->with('error', 'Error');
    }
}
