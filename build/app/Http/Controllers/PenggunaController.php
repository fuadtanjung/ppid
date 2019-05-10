<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;    
use Illuminate\Http\Request;
use DataTables;
use Auth;

class PenggunaController extends Controller
{
    public function index(){
        return view('akun.pengguna');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama' => 'required:users',
            'pekerjaan' => 'required:users',
            'no_telp' => 'required:users',
            'alamat' => 'required:users',
            'tgl_lhr' => 'required:users',
            'tempat_lhr' => 'required:users',
            'no_ktp' => 'required|unique:users',
            'username' => 'bail|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ], $pesan);
    }


    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if($validasi->passes()){
            $pengguna = new Pengguna;
            $pengguna->username = $request->username;
            $pengguna->email = $request->email;
            $pengguna->nama = $request->nama;
            $pengguna->pekerjaan = $request->pekerjaan;
            $pengguna->no_telp = $request->no_telp;
            $pengguna->alamat = $request->alamat;
            $pengguna->no_ktp = $request->no_ktp;
            $pengguna->tempat_lhr = $request->tempat_lhr;
            $pengguna->tgl_lhr = $request->tgl_lhr;
            $pengguna->password = bcrypt($request->password);

            $pengguna->save();

            if($pengguna->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Pengguna"));
            }else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Pengguna"));
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
        $pengguna = Pengguna::get();
        return Datatables::of($pengguna)
            ->addColumn('action', function($pengguna){
                return "                
    				<a href=\"#\" class=\"btn btn-outline-success btn-sm legitRipple\" id=\"edit\"><i class=\"icon-eye\"></i></a>   			
    				<a href=\"#\" class=\"btn btn-outline-danger btn-sm legitRipple\" id=\"delete\"><i class=\"icon-trash\"></i></a>					
                ";
            })
            ->make(true);
    }

    public function delete($id){
        $pengguna = Pengguna::where('id_user', $id)->first();
        if($pengguna->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Pengelola"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Pengelola"));
        }
    }

    public function profilpengguna(){

        $id = Auth::user()->id_user;
        $data = Pengguna::where('id_user',$id)->first();
//        dd($data);
        return view('pengguna.profilpengguna',compact('data',$data));
    }

}
