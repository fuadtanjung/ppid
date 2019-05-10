<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use DataTables;

class PermintaanController extends Controller
{
    public function index(){
        return view('permintaan.permintaan');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'pesan' => 'required:tanggapan',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $tanggapan = new tanggapan;
            $id_permintaan = $request->id_permintaan;
            $tanggapan->id_user = $request->id_user;
            $tanggapan->id_instansi = $request->id_instansi;
            $tanggapan->id_permintaan = $id_permintaan;
            $tanggapan->pesan = $request->pesan;
            $date = date('Y-m-d');

            if($tanggapan->save()){
                $permintaan = Permintaan::where('id_permintaan', $id_permintaan)->first();
                $permintaan->ket = "selesai";
                $permintaan->tgl_konfirm = $date;
                $permintaan->update();
                return json_encode(array("success"=>"Berhasil Menambahkan Data Kategori"));
            }else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Kategori"));
            }
        }else{
            $msg = $validasi->getMessageBag()->messages();
            $err = array();
            foreach ($msg as $key=>$item) {
                $err[] = $item[0];
            }

            return json_encode(array("error"=>$err));
        }
    }

    public function ajaxTablebelum(){
        $status = "belum";
        $permintaan = Permintaan::where('ket',$status)
            ->with(['users', 'instansi'])->get();
        return Datatables::of($permintaan)
            ->addColumn('action', function($permintaan){
                return "                
                    <a href=\"#\" class=\"btn btn-outline-success btn-sm legitRipple\" id=\"send\"><i class=\"icon-send-o\"></i></a>
    				<a href=\"#\" class=\"btn btn-outline-primary btn-sm legitRipple\" id=\"edit\"><i class=\"icon-eye\"></i></a>		
                    <a href=\"#\" class=\"btn btn-outline-warning btn-sm legitRipple\" id=\"print\"><i class=\"icon-printer-text4\"></i></a>
                ";
            })

            ->make(true);
    }

    public function ajaxTableselesai(){
        $status = "selesai";
        $permintaan = Permintaan::where('ket',$status)
            ->with(['users', 'instansi'])->get();
        return Datatables::of($permintaan)
            ->addColumn('action', function($permintaan){
                return "                                   
                    <a href=\"#\" class=\"btn btn-outline-warning btn-sm legitRipple\" id=\"print\"><i class=\"icon-printer-text4\"></i></a>
                ";
            })

            ->make(true);
    }

    public function ajaxTablesemua(){
        $permintaan = Permintaan::with(['users', 'instansi'])->get();
        return Datatables::of($permintaan)
            ->make(true);
    }
}