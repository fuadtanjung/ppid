<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use DataTables;
class KategoriController extends Controller
{
    public function listKategori(){
        $kategori = Kategori::all();
        return json_encode($kategori);
    }

    public function index(){
        return view('informasi.kategori');
    }


    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'kategori' => 'required:kategori',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $kategori = new kategori;
            $kategori->kategori = $request->kategori;
            if($kategori->save()){
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

    public function ajaxTable(){
        $kategori = Kategori::get();
        return Datatables::of($kategori)
            ->addColumn('action', function($kategori){
                return "                
        <a href=\"#\" class=\"btn btn-outline-success btn-sm legitRipple\" id=\"edit\"><i class=\"icon-pencil\"></i> </a>       
        <a href=\"#\" class=\"btn btn-outline-danger btn-sm legitRipple\" id=\"delete\"><i class=\"icon-trash\"></i> </a>     
                ";
            })
            ->make(true);
    }

    public function edit($id, Request $request){
        $kategori = Kategori::where('id_kategori', $id)->first();
        $kategori->kategori = $request->kategori;
        if($kategori->update()){
            return json_encode(array("success"=>"Berhasil Merubah Data Kategori :)"));
        }else{
            return json_encode(array("error"=>"Gagal Merubah Data Kategori :("));
        }
    }

    public function delete($id){
        $kategori = Kategori::where('id_kategori', $id)->first();
        if($kategori->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Kategori :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Kategori :("));
        }
    }

}