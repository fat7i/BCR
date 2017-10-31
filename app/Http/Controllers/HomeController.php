<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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

        $data = [];
        $data['email'] = $request->email;
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
}
