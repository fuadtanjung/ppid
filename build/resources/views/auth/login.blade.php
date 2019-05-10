
@extends('layouts.navberanda')
@section('title')
    login
    @endsection

@section('css')
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/pnotify.custom.css') }}">
@endsection

    @section('content')
<div id="app">
    <main>
        <div id="primary" class="blue4 p-t-b-100 height-full responsive-phone">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 pull-left">
                        <div class="col-lg-200">
                            <button type="button" class="btn btn-primary btn-sm legitRipple" data-toggle="modal" data-target="#input_pengguna">
                                <i class="icon-plus position-left"></i> Daftar Disini
                                <span class="legitRipple-ripple" style="left: 36.5385%; top: 52.7778%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 211.643%;"></span>
                            </button>
                        </div>
                        <br>
                        @if(count($errors))
                            @foreach ($errors->all() as $error)
                                <div class="toast toast-error"
                                     data-title="Login Gagal"
                                     data-message="Pastikan Username dan Password anda benar"
                                     data-type="error"
                                     data-position-class="toast-top-right">
                                </div>
                            @endforeach
                        @endif
                        @if(session()->has('notif'))
                            <div class="alert bg-success">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold"></span> {{ session()->get('notif') }}
                            </div>
                        @endif
                        <form action="{{ route('post_login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                                        <input type="text" class="form-control form-control-lg no-b"
                                               placeholder="Username" name="username" id="username" value="{{ old('username') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                        <input type="password" class="form-control form-control-lg no-b"
                                               placeholder="Password" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-success btn-lg btn-block" id="submit" name="submit" value="Masuk">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="input_pengguna" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Input pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form id="form_pengguna" class="form-material">
                            {{ csrf_field() }}
                            <legend class="text-semibold">Form pengguna PPID</legend>
                            <br>
                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <h6>Nama Lengkap</h6>
                                            <input type="text" class="form-control" id="nama" name="nama">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <h6>NO KTP</h6>
                                            <input type="number" class="form-control" id="no_ktp" name="no_ktp">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <h6>Tanggal Lahir</h6>
                                            <input type="date" class="form-control" id="tgl_lhr" name="tgl_lhr">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <h6>Tempat Lahir</h6>
                                            <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <h6>Alamat</h6>
                                            <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <h6>NO Telepon</h6>
                                            <input type="number" class="form-control" id="no_telp" name="no_telp">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <h6>Pekerjaan</h6>
                                        <select class="dropdown-item" required id="pekerjaan" name="pekerjaan">
                                            <option value="">Pilih Pekerjaan</option>
                                            <option value="PNS">Pegawai Negeri Sipil (PNS)</option>
                                            <option value="Kswasta">Karyawan Swasta</option>
                                            <option value="aparat">TNI/POLRI</option>
                                            <option value="wiraswasta">Wiraswata</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="pelajar">Pelajar</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <h6>Email</h6>
                                            <input type="text" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <h6>Username</h6>
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <h6>Password</h6>
                                            <input type="password" class="form-control" value="{{ old('password') }}" placeholder="Password" id="password" name="password" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <h6>Ulangi Password</h6>
                                            <input type="password" class="form-control" value="{{ old('password') }}" placeholder="Password" id="password_confirmation" name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                        <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_pengguna">Daftar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- #primary -->
    </main>

    <div class="control-sidebar-bg shadow white fixed"></div>
</div>
@endsection
@section('jsoperation')
<!--/#app -->
    <script src="{{ url('assets/dashboard/js/app.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/pnotify.custom.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/inputmask.js') }}"></script>
    <script src="{{ url('assets/dashboard/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/plugins/mask/dist/jquery.mask.js') }}"></script>
    <script type="text/javascript">

        function resetFormpengguna() {
            $("#form_pengguna")[0].reset();
            $('#pekerjaan').val("").change();
            $('#tgl_lhr').val("").change();
        }

                $('#submit_pengguna').click(function () {
                    var aksi = $("#submit_pengguna").attr("aksi");
                        $.ajax({
                            url: "{{ url('/pengguna/input') }}",
                            type: "post",
                            data: new FormData($('#form_pengguna')[0] ),
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
                                    resetFormpengguna();
                                    $('#input_pengguna').modal('toggle');
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
                                    text: 'Gagal Menambahkan Data pengguna',
                                    type: 'error',
                                    hide: true
                                });
                            }
                        });
                });

                $('#input_pengguna').on('hidden.bs.modal', function () {
                    resetFormpengguna();
                    $("#submit_pengguna").attr("submit_pengguna");
                });
    </script>
    @endsection





