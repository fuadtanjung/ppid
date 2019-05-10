<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Permintaan;
use App\Models\Pengguna;
use App\Models\Instansi;
use DataTables;

class BerandaController extends Controller
{
    public function index(){
    	$status = "belum";
    	$countInfo = Informasi::count();		
    	$countMinta = Permintaan::where('ket',$status)->count();
    	$countUser = Pengguna::count();
        return view('beranda.beranda')->with([
        	"countInfo" => $countInfo,
        	"countMinta" => $countMinta,
        	"countUser" => $countUser,
        ]);

    }

    public function ajaxTable(){
        $informasi = Informasi::with(['instansi'])->get();
        return Datatables::of($informasi)
            ->addColumn('action', function($informasi){
                return "                
    				<a href=\"#\" class=\"btn btn-outline-success btn-sm legitRipple\" id=\"edit\"><i class=\"icon-pencil\"></i> </a>
    				<a href=\"#\" class=\"btn btn-outline-primary btn-sm legitRipple\" id=\"change\"><i class=\"icon-power-off\"></i></a>    			
    				<a href=\"#\" class=\"btn btn-outline-danger btn-sm legitRipple\" id=\"delete\"><i class=\"icon-trash\"></i> </a>					
                ";
            })
            ->make(true);
    }
}
