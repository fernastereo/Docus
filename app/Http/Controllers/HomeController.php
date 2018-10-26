<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Document;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->profile_id == 3){
            $documents = Document::where([
                ['user_id', Auth::user()->id], 
                ['company_id', Auth::user()->company_id]
            ])->orderBy('created_at', 'desc')->paginate(10);
        }else{
            $documents = Document::where('company_id', Auth::user()->company_id)->orderBy('created_at', 'desc')->paginate(10);
        }
        //dd($documents);
        return view('home', ['documents' => $documents]);
    }
}
