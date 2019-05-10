<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;
use DataTables;

class LogController extends Controller
{
    public function index(){
        return view('permintaan.logbalasan');
    }
    public function ajaxTable(){
        $data = Tanggapan::with(['instansi'])
            ->with(['permintaan'])
            ->get();
        return Datatables::of($data)
            ->addColumn('action', function($data){
                return "                
    				<a href=\"#\" class=\"btn btn-outline-success btn-sm legitRipple\" id=\"view\"><i class=\"icon-eye\"></i></a>    			    							
                ";
            })
            ->make(true);
    }
}
