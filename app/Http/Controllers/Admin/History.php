<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class History extends Controller
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
        $data['docs'] = DB::table('doc_drafts as dd')
            ->selectRaw('dt.doc_name, ifnull(dd.updated_at, dd.created_at) as date, dd.id, dd.content')
            ->leftjoin('docs_type as dt', 'dt.id', 'dd.doc_type')
            ->orderby('date', 'desc')
            ->get();
        return view('admin/history', $data);
    }

    public function post()
    {
        return view('home');
    }
}
