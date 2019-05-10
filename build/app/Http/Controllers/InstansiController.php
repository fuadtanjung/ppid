<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi;
use DataTables;

class InstansiController extends Controller
{
    public function index(){
        return view('instansi.instansi');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'instansi' => 'bail|required',
            'nip' => 'required|unique:instansi',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if($validasi->passes()){
            $instansi = new Instansi;
            $instansi->instansi = $request->instansi;
            $instansi->pejabat = $request->pejabat;
            $instansi->nip = $request->nip;
            if($instansi->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Instansi"));
            }else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Instansi"));
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
        $instansi = Instansi::all();
        return Datatables::of($instansi)
            ->addColumn('action', function($instansi){
                return "                
    				<a href=\"#\" class=\"btn btn-outline-success btn-sm legitRipple\" id=\"edit\"><i class=\"icon-pencil\"></i></a>    			    			
    				<a href=\"#\" class=\"btn btn-outline-danger btn-sm legitRipple\" id=\"delete\"><i class=\"icon-trash\"></i></a>					
                ";
            })
            ->make(true);
    }

    public function edit($id, Request $request){
        $instansi = Instansi::where('id_instansi', $id)->first();
        $instansi->instansi = $request->instansi;
        $instansi->pejabat = $request->pejabat;
        $instansi->nip = $request->nip;
        if($instansi->update()){
            return json_encode(array("success"=>"Berhasil Merubah Data Instansi"));
        }else{
            return json_encode(array("error"=>"Gagal Merubah Data Instansi"));
        }
    }

    public function delete($id){
        $instansi = Instansi::where('id_instansi', $id)->first();
        if($instansi->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Instansi"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Instansi"));
        }
    }

    public function listInstansi(){
        $instansi = Instansi::all();
        return json_encode($instansi);
    }
}
