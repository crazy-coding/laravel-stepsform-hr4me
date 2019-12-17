<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Func extends Model {
    static public function get_rows_by_table($table) {
        return DB::select("select * from ".$table);
    }

}
    