<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Auth;
use Illuminate\Http\Request;
use App\Models\Permintaan;
use App\Models\Tanggapan;
use DataTables;

class PermohonanController extends Controller
{
    public function index(){

        $id = Auth::user()->id_user;
        $data = permintaan::where('id_user',$id)->first();

        return view('permintaan.permintaanbaru',compact('data',$data));
    }

    public function ajaxTable(){
        $id = Auth::user()->id_user;
        $data = Pengguna::where('id_user',$id)->first();
        return json_encode($data);
    }
    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'id_user' => 'required:perimintaan',
            'info_diminta' => 'required:permintaan',
            'instansi' => 'required:permintaan',
            'alasan' => 'required:permintaan',
            'nama' => 'required:permintaan',
            'no_ktp' => 'required:permintaan',
            'alamat' => 'required:permintaan',
            'email' => 'required:permintaan',
            'no_telp' => 'required:permintaan',
            'alasan_pengguna' => 'required:permintaan',

        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());

//        $user= $request->id_user;
//        $instansi = $request->instansi;
//        $nama = $request->nama;
//        $ktp = $request->no_ktp;
//        $telp = $request->no_telp;
//        $alamat = $request->alamat;
//        $email = $request->email;
//        $idim = $request->info_diminta;
//        $alasan = $request->alasan;
//        $aldim = $request->alasan_pengguna;
        $date = date('Y-m-d');
        $ket = 'belum';

//        dd($user,$instansi,$nama,$ktp,$telp,$alamat,$email,$idim,$alasan,$aldim,$date,$ket);

        if($validasi->passes()){
            $permintaan = new Permintaan;
            $permintaan->id_user = $request->id_user;
            $permintaan->id_instansi = $request->instansi;
            $permintaan->pengguna_info = $request->nama;
            $permintaan->nomor_ktp = $request->no_ktp;
            $permintaan->no_telepon = $request->no_telp;
            $permintaan->alamat_pengguna = $request->alamat;
            $permintaan->email_pengguna = $request->email;
            $permintaan->info_diminta = $request->info_diminta;
            $permintaan->alasan = $request->alasan;
            $permintaan->alasan_pengguna = $request->alasan_pengguna;
            $permintaan->tgl_permintaan = $date;
            $permintaan->ket = $ket;

            $permintaan->save();

            if($permintaan->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Permohonan"));
            }else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Permohonan"));
            }
        }
        else{
            $msg = $validasi->getMessageBag()->messages();
            $err = array();
            foreach ($msg as $key=>$item) {
                $err[] = $item[0];
            }

            return json_encode(array("error"=>$err));
        }

    }

}
