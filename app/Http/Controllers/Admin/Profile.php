<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Profile extends Controller
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
    public function get()
    {
        return view('admin/profile');
    }

    public function post()
    {
        return view('home');
    }
}
