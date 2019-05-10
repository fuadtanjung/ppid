<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Auth;
use Illuminate\Http\Request;
use DataTables;

class BalasanController extends Controller
{
    public function index(){
        $id = Auth::user()->id_user;
        $data = Tanggapan::where('id_user',$id)->first();
        return view('pengguna.balasan',compact('data',$data));
    }
    public function ajaxTable(){
        $id = Auth::user()->id_user;
        $data = Tanggapan::with(['instansi'])->with(['permintaan'])
            ->where('id_user',$id)
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
