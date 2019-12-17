<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Drafts extends Controller
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
    public function get(Request $request)
    {
        if($request->input("delete")) {
            DB::table('doc_drafts')->where("id", $request->input("delete"))->delete();
        }

        $data['docs'] = DB::table('doc_drafts as dd')
            ->selectRaw('dt.doc_name, ifnull(dd.updated_at, dd.created_at) as date, dd.id, dd.content')
            ->leftjoin('docs_type as dt', 'dt.id', 'dd.doc_type')
            ->get();
        return view('admin/drafts', $data);
    }

    public function post()
    {
        return view('home');
    }
}
