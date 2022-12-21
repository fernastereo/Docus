<?php

namespace App\Http\Controllers;

use App\User;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // dd(Auth::user()->company_id);
        if (Auth::user()->profile_id == 3) {
            $documents = Document::where([
                ['user_id', Auth::user()->id],
                ['company_id', Auth::user()->company_id]
            ])->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $documents = Document::where('company_id', Auth::user()->company_id)->orderBy('created_at', 'desc')->paginate(10);
        }
        // dd($documents);
        return view('home', ['documents' => $documents]);
    }

    public function showChangePassword()
    {
        return view('auth.changePassword', ['id' => Auth::user()->id, 'name' => Auth::user()->name]);
    }

    public function changePassword(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->update([
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();

        return redirect()->route('password.change')->with('success', 'Password actualizado');;
    }
}
