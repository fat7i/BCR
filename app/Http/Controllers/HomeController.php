<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['contact', 'postContact', 'index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::user() ) {
            return view('home', ['activities' => Auth::user()->activities]);
        }else {
            return view('misc.home_visitor');
        }
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
            'g-recaptcha-response' => 'required',
        ]);

        $data = [];
        $data['email'] = ($request->email)? $request->email : 'nobody@somewhere.com';
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['body_msg'] = $request->message;

        Mail::send('emails.contact_form', $data, function ($message) use ($data) {
            $message->to('fat7i.wp@gmail.com', 'Mohamed Fathi');
            $message->from($data['email'], $data['name']);
            $message->subject('Contact Form');
        });

        return  back()->with('message', 'Thanks a lot, We\'ll contact you soon!');
    }

    public function search()
    {
        echo "<h1>Search...</h1>"; //TODO search by name
    }

}
