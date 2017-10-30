<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function postContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);
        dd($request->all());
        // TODO send mail + mailgun
    }
}
