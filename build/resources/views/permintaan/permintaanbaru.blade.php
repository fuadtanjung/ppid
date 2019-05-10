@extends('layouts.navberanda')
@section('title')
    input pengaduan
@endsection
@section('content')
    <div id="input_pengelola" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_permohonan" class="form-material">
                        {{ csrf_field() }}
                        <legend class="text-semibold">Form Permohonan</legend>
                        <br>
                        <div class="row clearfix">

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Pemohon</h6>
                                        <input type="hidden" class="form-control" id="id_user" name="id_user">
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Informasi yang dibutuhkan</h6>
                                        <input type="text" class="form-control" id="info_diminta" name="info_diminta">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Instansi Terkait</h6>
                                        <select class="custom-select select2" required id="instansi" name="instansi">
                                            <option value="">Pilih Instansi</option>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Alasan Permintaan</h6>
                                        <textarea type="text" class="form-control" id="alasan" name="alasan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Nama Lengkap Pengguna Informasi</h6>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Nomor KTP</h6>
                                        <input type="number" class="form-control" id="no_ktp" name="no_ktp">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Alamat Pengguna Informasi</h6>
                                        <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Email Pengguna Informasi</h6>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Nomor Telepon Pengguna Informasi</h6>
                                        <input type="number" class="form-control" id="no_telp" name="no_telp">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Alasan Pengguna Informasi</h6>
                                        <textarea type="text" class="form-control" id="alasan_pengguna" name="alasan_pengguna"></textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_permohonan">Kirim Permohonan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsoperation')

    <script type="text/javascript">

        {{-- Drop Down Database--}}
        $.ajax({
            url: '{{ url('instansi/list') }}',
            dataType: "json",
            success: function(data) {
                var instansi = jQuery.parseJSON(JSON.stringify(data));
                $.each(instansi, function(k, v) {
                    $('#instansi').append($('<option>', {value:v.id_instansi}).text(v.instansi))
                })
            }
        });

        {{-- Memeberi Value Input Username dan ID--}}
        $.ajax({
            url: '{{ url('permohonan/data') }}',
            dataType: "json",
            success: function(data) {
                var permintaan = jQuery.parseJSON(JSON.stringify(data));
                $.each(permintaan, function() {
                    $('#id_user').val(permintaan.id_user).change();
                    $('#username').val(permintaan.username).change();
                })
            }
        });

        {{-- Memasukkan Permintaan--}}
        function resetFormpermohonan() {
            $("#form_permohonan")[0].reset();
            $('#instansi').val("").change();
        }

        $('#submit_permohonan').click(function () {
            var aksi = $("#submit_permohonan").attr("aksi");
            $.ajax({
                url: "{{ url('/permintaan/input') }}",
                type: "post",
                data: new FormData($('#form_permohonan')[0] ),
                async: false,
                cache: false,
                contentType: false,
                processData: false,

                success: function (response) {
                    var pesan = JSON.parse(response);
                    if(pesan.error != null){
                        new PNotify({
                            title: 'Error notice',
                            text: pesan.error,
                            type: 'error'
                        });
                    }else if(pesan.success != null){
                        new PNotify({
                            title: 'Success notice',
                            text: pesan.success,
                            type: 'success'
                        });
                        resetFormpermohonan();
                        $('#input_permohonan').formData('toggle');
                    }else {
                        new PNotify({
                            title: 'Warning',
                            text: "Can't retrieve any data from server",
                        });
                    }
                },
                fail: function () {
                    new PNotify({
                        title: 'Error notice',
                        text: 'Gagal Menambahkan Permohonan',
                        type: 'error',
                        hide: true
                    });
                }
            });
        });

        $('#input_permohonan').on('formData', function () {
            resetFormpermohonan();
            $("#submit_permohonan").attr("submit_permohonan");
        });

    </script>
@endsection