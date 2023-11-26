<?php

namespace App\Http\Controllers;

use view;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(view()->exists($id)){
            return response(view($id));
        }
        else
        {
            return $this->view('404');
        }

        //return $this->view($id);
    }


    public function signin(){
        return view('signin');
    }

    
}
