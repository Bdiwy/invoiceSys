<?php

namespace App\Http\Controllers;

use App\Models\AddProd;
use App\Models\sections;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Requests\ProdValidatedRequest;

class AddProdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = AddProd::all();
        $sections = sections::all();
        return response(view('products.add-prod',compact('sections', 'products',))) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdValidatedRequest $request)
    {
        AddProd::create([
            'product_name'=> $request->product_name	,
            'description' => $request->description,
            'section_id'=> $request->section_id	,

        ]);
        return redirect('add-product')->with('message','successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddProd  $addProd
     * @return \Illuminate\Http\Response
     */
    public function show(AddProd $addProd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddProd  $addProd
     * @return \Illuminate\Http\Response
     */
    public function edit(AddProd $addProd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddProd  $addProd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(empty(auth()->id())) {
            abort(403, 'Unauthorized Action');
        }
        $id = sections::where('section_name', '=', $request->section_name)->first()->id;
        $products= AddProd::findorFail($request->id);
    
        AddProd::where('id',$request->id)
        
        ->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'section_id' => $id,

        ]);
        return redirect('add-product')->with('message','updated successfully');   
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddProd  $addProd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        AddProd::where('id','=', $request->id)->delete($request->id);
        return redirect('add-product')->with('delete','deleted successfully');  

    }
}
