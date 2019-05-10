<?php

namespace App\Http\Controllers;

use App\Models\Pengelola;
use Illuminate\Http\Request;
use DataTables;

class PengelolaController extends Controller
{
    public function index(){
        return view('akun.pengelola');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'username' => 'bail|required',
            'email' => 'required|unique:pengelola',
            'password' => 'required|min:6|confirmed',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if($validasi->passes()){
            $pengelola = new Pengelola;
            $pengelola->id_instansi = $request->id_instansi;
            $pengelola->username = $request->username;
            $pengelola->email = $request->email;
            $pengelola->level = $request->level;
            $pengelola->status = "active";
            $pengelola->password = bcrypt($request->password);
            if($pengelola->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Pengelola"));
            }else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Pengelola"));
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
        $pengelola = Pengelola::with(['instansi'])->get();
        return Datatables::of($pengelola)
            ->addColumn('action', function($pengelola){
                return "                
    				<a href=\"#\" class=\"btn btn-outline-success btn-sm legitRipple\" id=\"edit\"><i class=\"icon-pencil\"></i></a>
    				<a href=\"#\" class=\"btn btn-outline-primary btn-sm legitRipple\" id=\"change\"><i class=\"icon-power-off\"></i></a>    			
    				<a href=\"#\" class=\"btn btn-outline-danger btn-sm legitRipple\" id=\"delete\"><i class=\"icon-trash\"></i></a>					
                ";
            })
            ->make(true);
    }

    public function changeStatus($id){
        $pengelola = Pengelola::where('id_pengelola', $id)->first();
        if($pengelola->status == "non_active"){
            $pengelola->status = "active";
            $pengelola->update();
        }else{
            $pengelola->status = "non_active";
            $pengelola->update();
        }
    }

    public function edit($id, Request $request){
        $pengelola = Pengelola::where('id_pengelola', $id)->first();
        $pengelola->id_instansi = $request->id_instansi;
        $pengelola->username = $request->username;
        $pengelola->email = $request->email;
        $pengelola->level = $request->level;
        $pengelola->status = "active";
        if($pengelola->update()){
            return json_encode(array("success"=>"Berhasil Merubah Data Pengelola"));
        }else{
            return json_encode(array("error"=>"Gagal Merubah Data Pengelola"));
        }
    }

    public function delete($id){
        $pengelola = Pengelola::where('id_pengelola', $id)->first();
        if($pengelola->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Pengelola"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Pengelola"));
        }
    }
}
