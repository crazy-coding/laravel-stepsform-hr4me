<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateDoc extends Controller
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
        $data = [];
        if($request->input("doc_id")) {
            $data = DB::table('doc_drafts')->where('id', $request->input("doc_id"))->get();
        }
        return view('admin/create', $data);
    }

    public function post(Request $request)
    {
        $insert_data = [
            "doc_type"          => $request->input("doc_type"),
            "ins_amount"        => $request->input("ins_amount"),
            "ins_currency"      => $request->input("ins_currency"),
            "pay_rate"          => $request->input("pay_rate"),
            "food_allow_amt"    => $request->input("food_allow_amt"),
            "food_allow_unit"   => $request->input("food_allow_unit"),
            "food_allow_reg"    => $request->input("food_allow_reg") == "on" ? true : false,
            "annual_amt"        => $request->input("annual_amt"),
            "annual_unit"       => $request->input("annual_unit"),
            "annual_reg"        => $request->input("annual_reg") == "on" ? true : false,
            "vaccation_amt"     => $request->input("vaccation_amt"),
            "vaccation_reg"     => $request->input("vaccation_reg") == "on" ? true : false,
            "content"           => $request->input("content"),
            "author"            => Auth::id(),
            "date_paying"       => $request->input("date_paying"),
            "updated_at"        => $request->input("doc_id") ? date("Y-m-d H:i:s") : null,
        ];

        if($request->input("doc_id")) { 
            DB::table('doc_drafts')->where('id', $request->input("doc_id"))->update(
                $insert_data
            );   
        } else {
            DB::table('doc_drafts')->insert(
                $insert_data
            ); 
        }
        

        return redirect("drafts");
    }
}
