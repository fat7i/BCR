<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Location;

class LocationController extends Controller
{
    public function create ()
    {
        return view('location.create');
    }

    public function store (Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Location::create(
            Input::except('_method', '_token')
        );

        return back()->with('message', 'Thanks a lot for your contribution!');
    }

    public function show ($id)
    {
        $location = Location::findOrfail($id);
        return view('location.show', ['location' => $location]);
    }
}
