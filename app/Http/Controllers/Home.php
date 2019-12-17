<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
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
        return redirect('create');
    }

    public function topdf($id)
    {
        $docs = $this->get_html($id);
        $type = 'download';
        $pdf = app('dompdf.wrapper')->loadView('print.doc', ['doc' => $docs]);

        if ($type == 'stream') {
            return $pdf->stream('invoice.pdf');
        }

        if ($type == 'download') {
            return $pdf->download('invoice.pdf');
        } 
    }

    public function todoc($id)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection();
        

        $docs = $this->get_html($id);
        $description = view('print.doc_print', ['doc' => $docs]);
        $section->addText($description);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('docs.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('docs.docx'));
    }

    public function toemail($id)
    {
        $docs = $this->get_html($id);
        return view('print.doc_email', ['doc' => $docs]);
    }

    public function toprint($id)
    {
        $docs = $this->get_html($id);
        return view('print.doc_print', ['doc' => $docs]); 
    }

    public function get_html($id)
    {
        $data = [];

        $data = DB::table('doc_drafts as dd')
            ->selectRaw('dd.id, dt.doc_name, dd.ins_amount, c.cur_name as ins_currency, 
                dd.pay_rate, dd.food_allow_amt, u1.unit_name as food_allow_unit, 
                dd.food_allow_reg, dd.annual_amt, u2.unit_name as annual_unit, 
                dd.annual_reg, dd.vaccation_amt, dd.vaccation_reg, dd.content,
                ifnull(auth.fullname, auth.name) as author, dd.created_at, dd.updated_at,
                dd.date_paying')
            ->leftjoin('docs_type as dt', 'dt.id', 'dd.doc_type')
            ->leftjoin('currencies as c', 'dd.ins_currency', 'c.type')
            ->leftjoin('units as u1', 'u1.type', 'dd.food_allow_unit')
            ->leftjoin('units as u2', 'u2.type', 'dd.annual_unit')
            ->leftjoin('users as auth', 'auth.id', 'dd.author')
            ->where('dd.id', $id)
            ->first();

        return $data;
    }
}
