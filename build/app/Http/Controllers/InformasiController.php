<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use DataTables;

class InformasiController extends Controller
{
    public function index(){
        return view('informasi.info');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_info' => 'required:informasi',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $informasi = new Informasi;
            $informasi->id_instansi = 22;
            $informasi->nama_info = $request->nama_info;
            $informasi->id_kategori = $request->id_kategori;
            $informasi->ringkasan = $request->ringkasan;
            $informasi->penanggungjawab = $request->penanggungjawab;
            $informasi->tgl_info = date('Y-m-d');
            $informasi->tanggal_buat = $request->tanggal_buat;
            $informasi->jangka_waktu = $request->jangka_waktu;
            $informasi->file_info = $request->file_info;
            if($informasi->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Informasi"));
            }else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Informasi"));
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

    public function edit($id, Request $request){
        $informasi = Informasi::where('id_info', $id)->first();
        $informasi->id_info = $request->id_info;
        $informasi->nama_info = $request->nama_info;
        $informasi->id_kategori = $request->id_kategori;
        $informasi->ringkasan = $request->ringkasan;
        $informasi->penanggungjawab = $request->penanggungjawab;
        $informasi->tgl_info = $request->tgl_info;
        $informasi->jangka_waktu = $request->jangka_waktu;
        $informasi->file_info = $request->file_info;
        if($informasi->update()){
            return json_encode(array("success"=>"Berhasil Merubah Data Informasi :)"));
        }else{
            return json_encode(array("error"=>"Gagal Merubah Data Informasi :("));
        }
    }

    public function delete($id){
        $informasi = Informasi::where('id_info', $id)->first();
        if($informasi->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Informasi :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Informasi :("));
        }
    }

    public function changeStatus($id){
        $pengelola = Informasi::where('id_info', $id)->first();
        if($pengelola->status == "0"){
            $pengelola->status = "1";
            $pengelola->update();
        }else{
            $pengelola->status = "0";
            $pengelola->update();
        }
    }

//    public function listOpd(){
//        $opd = Opd::all();
//        return json_encode($opd);
//    }
}
