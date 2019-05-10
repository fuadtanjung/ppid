@extends('layouts.app')
@section('title')
    Pengelola
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card no-b">
            <div class="card-body b-b">
                <h4>Daftar Pengelola PPID</h4>
                <button type="button" class="btn btn-primary btn-sm legitRipple" data-toggle="modal" data-target="#input_pengelola">
                    <i class="icon-plus position-left"></i> Tambah
                    <span class="legitRipple-ripple" style="left: 36.5385%; top: 52.7778%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 211.643%;"></span>
                </button>
                <table class="table table-bordered " id="datatable">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Instansi</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Instansi</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div id="input_pengelola" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Input Pengelola</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form id="form_pengelola" class="form-material">
                                {{ csrf_field() }}
                                <legend class="text-semibold">Form Pengelola PPID</legend>
                                <br>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Username</h6>
                                                <input type="text" class="form-control" id="username" name="username">
                                            </div>
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
                                            <h6>Instansi</h6>
                                            <select class="custom-select select2" required id="id_instansi" name="id_instansi">
                                                <option value="">Pilih Instansi</option>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <h6>Level</h6>
                                            <select class="custom-select select2" required id="level" name="level">
                                                <option value="">Pilih Level</option>
                                                <option value="admin">Administrator</option>
                                                <option value="operator">Operator</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
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
                            <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_pengelola">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jsoperation')
    <script type="text/javascript">
        function loadData() {
            $('#datatable').dataTable({

                "ajax": "{{ url('/pengelola/data') }}",
                "columns": [
                    { "data": "username" },
                    { "data": "instansi.instansi" },
                    { "data": "email" },
                    { "data": "level",
                        render: function(level){
                            if(level == 'admin'){
                                return '<span class="badge badge-success">Admin</span></td>';
                            }else{
                                return '<span class="badge badge-primary">Operator</span></td>';
                            }
                        }
                    },
                    { "data": "status",
                        render: function(status){
                            if(status == 'active'){
                                return '<span class="badge badge-success">Aktif</span></td>';
                            }else{
                                return '<span class="badge badge-danger">Tidak Aktif</span></td>';
                            }
                        }
                    },
                    { "data": "action" }
                ],
                columnDefs: [
                    {
                        width: "100px",
                        targets: [0]
                    },
                    {
                        width: "250px",
                        targets: [1]
                    },
                    {
                        width: "250px",
                        targets: [2]
                    },
                    {
                        width: "100px",
                        targets: [3]
                    },
                    {
                        width: "100px",
                        targets: [4]
                    },
                    {
                        width: "100px",
                        targets: [5]
                    }
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
                dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Ketik untuk cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                }
            });
        }

        function resetFormPengelola() {
            $("#form_pengelola")[0].reset();
            $('#id_instansi').val("").change();
        }

        $(window).on('load', function () {
            loadData();
            $('#submit_pengelola').click(function () {
                var aksi = $("#submit_pengelola").attr("aksi");
                if(aksi=="input"){
                    $.ajax({
                        url: "{{ url('/pengelola/input') }}",
                        type: "post",
                        data: new FormData($('#form_pengelola')[0]),
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
                                $('#datatable').DataTable().destroy();
                                loadData();
                            }else if(pesan.success != null){
                                new PNotify({
                                    title: 'Success notice',
                                    text: pesan.success,
                                    type: 'success'
                                });
                                resetFormPengelola();
                                $('#input_pengelola').modal('toggle');
                                $('#datatable').DataTable().destroy();
                                loadData();
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
                                text: 'Gagal Menambahkan Data Pengelola',
                                type: 'error',
                                hide: true
                            });
                        }
                    });
                }else if(aksi=="edit"){
                    var id_pengelola = $("#submit_pengelola").attr("idpengelola");
                    $.ajax({
                        url: "{{ url('/pengelola/edit') }}/"+id_pengelola,
                        type: "post",
                        data: new FormData($('#form_pengelola')[0]),
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
                                    type: 'error',
                                    hide: true
                                });
                                $('#datatable').DataTable().destroy();
                                loadData();
                            }else if(pesan.success != null){
                                new PNotify({
                                    title: 'Success notice',
                                    text: pesan.success,
                                    type: 'success'
                                });
                                resetFormPengelola();
                                $('#input_pengelola').modal('toggle');
                                $('#datatable').DataTable().destroy();
                                loadData();

                            }else {
                                new PNotify({
                                    title: 'Warning',
                                    text: "Can't retrieve any data from server",
                                    hide: true
                                });
                                $('#submit_pengelola').attr("data-aksi","input");
                            }


                        },
                        fail: function () {
                            new PNotify({
                                title: 'Error notice',
                                text: 'Can\'t retrieve any data from server, please contact your administrator',
                            });
                        }
                    });
                }
            });

            $('#datatable tbody').on('click', '#change', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $.ajax({
                    url: "{{ url('/pengelola/change') }}/"+data.id_pengelola,
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        new PNotify({
                            title: 'Success notice',
                            text: "Berhasil Merubah Status",
                            type: 'success'
                        });
                        $('#datatable').DataTable().ajax.reload();
                    },
                    error: function () {
                        new PNotify({
                            title: 'Error notice',
                            text: "Something Wrong",
                            type: 'error'
                        });
                    }
                });
            } );

            $('#datatable tbody').on('click', '#edit', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $('#username').val(data.username).change();
                $('#email').val(data.email).change();
                $('#id_instansi').val(data.id_instansi).change();
                $('#level').val(data.level).change();
                $("#submit_pengelola").attr("aksi","edit");
                $('#submit_pengelola').attr("idpengelola",data.id_pengelola);
                $('#input_pengelola').modal('toggle');
            } );

            $('#datatable tbody').on('click', '#delete', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                swal.fire({
                    title: 'Apakah anda sudah yakin?',
                    text: "Aksi ini tidak bisa ditunda dan dikembalikan!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batalkan!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ url('/pengelola/delete/') }}/" + data.id_pengelola,
                            type: "post",
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            cache: false,
                            success: function (response) {
                                var pesan = JSON.parse(response);
                                swal.fire(
                                    "Berhasil!",
                                    pesan.success,
                                    "success"
                                );
                                table.destroy();
                                loadData();
                            },
                        });
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swal.fire(
                            'Dibatalkan',
                            'Data anda aman :)',
                            'error'
                        )
                    }
                });
            });

            $.ajax({
                url: '{{ url('instansi/list') }}',
                dataType: "json",
                success: function(data) {
                    var instansi = jQuery.parseJSON(JSON.stringify(data));
                    $.each(instansi, function(k, v) {
                        $('#id_instansi').append($('<option>', {value:v.id_instansi}).text(v.instansi))
                    })
                }
            });


            $('#input_pengelola').on('hidden.bs.modal', function () {
                resetFormPengelola();
                $("#submit_pengelola").attr("aksi","input");
                $('#submit_pengelola').removeAttr("idpengelola");
            });
        })
    </script>
@endsection