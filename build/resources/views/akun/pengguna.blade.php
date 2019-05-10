@extends('layouts.app')
@section('title')
    Pengguna
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card no-b">
            <div class="card-body b-b">
                <h4>Daftar Pengguna PPID</h4>
                    <span class="legitRipple-ripple" style="left: 36.5385%; top: 52.7778%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 211.643%;"></span>
                </button>
                <table class="table table-bordered " id="datatable">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div id="input_pengguna" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form id="form_pengguna" class="form-material">
                                {{ csrf_field() }}
                                <legend class="text-semibold">Form Pengguna PPID</legend>
                                <br>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                       <div class="form-group form-float">
                                           <div class="form-line">
                                               <h6>Nama</h6>
                                               <input type="text" class="form-control" id="nama" name="nama" disabled>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>No KTP</h6>
                                                <input type="text" class="form-control" id="no_ktp" name="no_ktp" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <h6>Tempat Lahir</h6>
                                                    <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <h6>Tanggal Lahir</h6>
                                                    <input type="text" class="form-control" id="tgl_lhr" name="tgl_lhr" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <h6>Alamat</h6>
                                                    <textarea type="text" class="form-control" id="alamat" name="alamat" disabled></textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <h6>Pekerjaan</h6>
                                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <h6>Nomor Telp</h6>
                                                    <input type="text" class="form-control" id="no_telp" name="no_telp" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Username</h6>
                                                <input type="text" class="form-control" id="username" name="username" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Email</h6>
                                                <input type="text" class="form-control" id="email" name="email" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
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

                "ajax": "{{ url('/pengguna/data') }}",
                "columns": [
                    { "data": "nama" },
                    { "data": "email" },
                    { "data": "username" },
                    { "data": "action" }
                ],
                columnDefs: [
                    {
                        width: "300px",
                        targets: [0]
                    },
                    {
                        width: "400px",
                        targets: [1]
                    },
                    {
                        width: "200px",
                        targets: [2]
                    },
                    {
                        width: "100px",
                        targets: [3]
                    },

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

        function resetFormPengguna() {
            $("#form_pengguna")[0].reset();
        }

        $(window).on('load', function () {
            loadData();

            $('#datatable tbody').on('click', '#edit', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $('#nama').val(data.nama).change();
                $('#no_ktp').val(data.no_ktp).change();
                $('#tempat_lhr').val(data.tempat_lhr).change();
                $('#tgl_lhr').val(data.tgl_lhr).change();
                $('#alamat').val(data.alamat).change();
                $('#pekerjaan').val(data.pekerjaan).change();
                $('#no_telp').val(data.no_telp).change();
                $('#username').val(data.username).change();
                $('#username').val(data.username).change();
                $('#email').val(data.email).change();
                $('#id_instansi').val(data.id_instansi).change();
                $('#level').val(data.level).change();
                $("#submit_pengguna").attr("aksi","edit");
                $('#submit_pengguna').attr("idpengguna",data.id_pengguna);
                $('#input_pengguna').modal('toggle');
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
                            url: "{{ url('/pengguna/delete/') }}/" + data.id_user,
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


            $('#input_pengguna').on('hidden.bs.modal', function () {
                resetFormPengguna();
                $("#submit_pengguna").attr("aksi","input");
            });
        })
    </script>
@endsection