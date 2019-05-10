@extends('layouts.app')
@section('content')

    <div class="col-lg-12">
        <div class="card no-b">
            <div class="card-body">
                <div class="card-title">Informasi Pengguna</div>
                <button type="button" class="btn btn-primary btn-sm legitRipple" data-toggle="modal" data-target="#input_informasi">
                    <i class="icon-plus position-left"></i> Edit Profil
                    <span class="legitRipple-ripple" style="left: 36.5385%; top: 52.7778%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 211.643%;"></span>
                </button>

                <br><br><br>

                <table height="300px" width="500px" >
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>: {{$data->nama}}</td>
                    </tr>
                    <tr>
                        <td>Tempat / Tanggal Lahir</td>
                        <td>: {{$data->tempat_lhr}} / {{$data->tgl_lhr}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>: {{$data->pekerjaan}}</td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>: {{$data->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>: {{$data->no_telp}}</td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>: {{$data->username}}</td>
                    </tr>
                    <tr>
                        <td>Alamat Email</td>
                        <td>: {{$data->email}}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>


@endsection
@section('jsoperation')

@endsection