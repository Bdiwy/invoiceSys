<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SecValidatedRequest;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=sections::get();
        return response(view('sections.add-sections',['data'=>$data]));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SecValidatedRequest $request)
    {        
            sections::create([
                'section_name' => $request->section_name,
                'description' => $request->description,
                'Created_by' => (Auth::user()->name),
            ]);
    
        
        return redirect('/add-sections')->with('message', 'the section added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        
        $id=$request->id;
        $Created_by=$request->Created_by;
        $section_name=$request->section_name;
        $description=$request->description;
        
        return response( view('sections.update-sec',[
            'id' => $id,
            'Created_by'=>$Created_by,
            'section_name'=>$section_name,
            'description'=>$description]));

        
    }

    
    public function update(Request $request,$id)
    {
        if(empty(auth()->id())) {
            abort(403, 'Unauthorized Action');
        }
    
        sections::where('id',$request->id)
        ->update([
            'section_name'=>$request->section_name,
            'description'=>$request->description,
        ]);
        return redirect('add-sections')->with('edit', 'Section updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seecId= $id;
        $find= sections::find($seecId);
        if($find)
            {$find -> delete();
                return redirect('/add-sections')->with('delete','deleted successfuly ');
            }else{
            return redirect('/add-sections')->with('delete','error nothing deleted !');
        
            }
    }
}
