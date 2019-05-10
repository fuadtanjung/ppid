@extends('layouts.app')
@section('title')
    Permintaan
@endsection
@section('content')
    <!-- Right Sidebar -->
    <aside class="control-sidebar fixed white ">
        <div class="slimScroll">
            <div class="sidebar-header">
                <h4>Filter Print</h4>
                <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
            </div>
            <div class="p-3">
                <div>
                    <!-- Basic Validation -->
                    <div class="card-body">
                        <form action="rekap/laporan" target="_blank" id="form_validation" class="form-material" method="POST">
                            {{ csrf_field() }}
                            <h6>Dari</h6>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" name="start" id="start" class="form-control" name="dari" />
                                </div>
                            </div>
                            <h6>Sampai</h6>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date"  name="end" id="end" class="form-control" name="sampai" />
                                </div>
                            </div>

                            <div class="form-group col-md-9">
                                <label for="inputStatus" class="col-form-label">Pilih Status Permintaan:</label>
                                <select id="inputstatus" name="inputstatus" class="form-control">
                                    <option value="belum">Belum diproses</option>
                                    <option value="selesai">Telah diproses</option>
                                    <option value="semua">Semua</option>
                                </select>
                            </div>

                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                    </div>

                    <!-- #END# Basic Validation -->
                </div>
            </div>
        </div>
    </aside>
    <!-- /.right-sidebar -->
    <div class="col-lg-12">
        <div class="card no-b">
            <div class="card-header indigo darken-1 text-white">
                <h4><i class="icon-message mr-2 mb-5"></i>Data Permintaan Informasi</h4>
                <div class="d-flex justify-content-between">
                    <div class="align-self-end">
                        <ul class="nav nav-material nav-material-white card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="w6--tab1" data-toggle="tab" href="#w6-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">BELUM DIPROSES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="w6--tab2" data-toggle="tab" href="#w6-tab2" role="tab" aria-controls="tab2" aria-selected="false">TELAH DIPROSES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="w6--tab3" data-toggle="tab" href="#w6-tab3" role="tab" aria-controls="tab3" aria-selected="false">SEMUA</a>
                            </li>
                        </ul>
                        <a class="btn btn-primary fab-right-bottom absolute icon-printer-text4" data-toggle="control-sidebar"> CETAK REKAP</a>

                    </div>
                </div>
            </div>

            <div class="card-body no-p">
                <div class="tab-content" id="v-pills-tabContent2">
                    <div class="tab-pane fade active show" id="w6-tab1" role="tabpanel" aria-labelledby="w6-tab1">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered " id="belumproses" width="100%">
                                <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pemohon</th>
                                    <th>Informasi yang diminta</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pemohon</th>
                                    <th>Informasi yang diminta</th>
                                    <th>Aksi</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="w6-tab2" role="tabpanel" aria-labelledby="w6-tab2">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered " id="selesai" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pemohon</th>
                                    <th>Informasi yang diminta</th>
                                    <th>Tanggal Konfirmasi</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pemohon</th>
                                    <th>Informasi yang diminta</th>
                                    <th>Tanggal Konfirmasi</th>
                                    <th>Aksi</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="w6-tab3" role="tabpanel" aria-labelledby="w6-tab3">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="semua" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pemohon</th>
                                    <th>Informasi yang diminta</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pemohon</th>
                                    <th>Informasi yang diminta</th>
                                    <th>Status</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="kirim_tanggapan" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tanggapan</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form id="form_tanggapan" class="form-material">
                                {{ csrf_field() }}
                                <legend class="text-semibold">Detail Tanggapan</legend>
                                <br>
                                <input type="hidden"  id="id_permintaan" name="id_permintaan">
                                <input type="hidden"  id="id_user" name="id_user">
                                <input type="hidden"  id="id_instansi" name="id_instansi">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Nama</h6>
                                                <input type="text" class="form-control" id="nama" name="nama">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Email</h6>
                                                <input type="text" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Instansi</h6>
                                                <input type="text" class="form-control" id="instansi" name="instansi">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Pesan</h6>
                                                <textarea type="text" class="form-control" id="pesan" name="pesan" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                            <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_tanggapan">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="detail" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Permintaan</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form id="form_permintaan" class="form-material">
                                {{ csrf_field() }}
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Nama Pemohon</h6>
                                                <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Nomor KTP</h6>
                                                <input type="text" class="form-control" id="no_ktp" name="no_ktp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Alamat Pemohon</h6>
                                                <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Nomor Telepon</h6>
                                                <input type="text" class="form-control" id="notelp" name="notelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
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
                                                <h6>Informasi yang dibutuhkan</h6>
                                                <textarea type="text" class="form-control" id="infobutuh" name="infobutuh"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Alasan Permintaan</h6>
                                                <input type="text" class="form-control" id="alasan" name="alasan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
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
                                                <h6>Alasan Pengguna Informasi</h6>
                                                <input type="text" class="form-control" id="alasan_info" name="alasan_info">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Tanggal Permintaan</h6>
                                                <input type="text" class="form-control" id="tgl_minta" name="tgl_minta">
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
            $('#belumproses').dataTable({

                "ajax": "{{ url('/permintaan/data-belum') }}",
                "columns": [
                    { "data": "tgl_permintaan" },
                    { "data": "users.nama",
                        render: function(nama){
                            if (nama != null) {
                                return nama;
                            }else{
                                return '<span class="badge badge-warning">-</span></td>';
                            }
                        }
                    },
                    { "data": "info_diminta" },
                    { "data": "action" }
                ],
                columnDefs: [
                    {
                        width: "150px",
                        targets: [0]
                    },
                    {
                        width: "250px",
                        targets: [1]
                    },
                    {
                        width: "550px",
                        targets: [2]
                    },
                    {
                        width: "120px",
                        orderable: false,
                        targets: [3]
                    },

                ],
                scrollX: true,
                scrollY: '700px',
                scrollCollapse: true,
                dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> INPUT',
                    searchPlaceholder: 'Ketik untuk cari...',
                    lengthMenu: '<span>Tampil:</span> MENU',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                }
            });

            $('#selesai').dataTable({

                "ajax": "{{ url('/permintaan/data-selesai') }}",
                "columns": [
                    { "data": "tgl_permintaan" },
                    { "data": "users.nama",
                        render: function(nama){
                            if (nama != null) {
                                return nama;
                            }else{
                                return '<span class="badge badge-warning">-</span></td>';
                            }
                        }
                    },
                    { "data": "info_diminta" },
                    { "data": "tgl_konfirm" },
                    { "data": "action" }
                ],
                columnDefs: [
                    {
                        width: "150px",
                        targets: [0]
                    },
                    {
                        width: "120px",
                        targets: [1]
                    },
                    {
                        width: "580px",
                        targets: [2]
                    },
                    {
                        width: "120px",
                        targets: [3]
                    },
                    {
                        width: "70px",
                        targets: [2]
                    },

                ],
                scrollCollapse: true,
                dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> INPUT',
                    searchPlaceholder: 'Ketik untuk cari...',
                    lengthMenu: '<span>Tampil:</span> MENU',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                }
            });

            $('#semua').dataTable({

                "ajax": "{{ url('/permintaan/data-semua') }}",
                "columns": [
                    { "data": "tgl_permintaan" },
                    { "data": "users.nama",
                        render: function(nama){
                            if (nama != null) {
                                return nama;
                            }else{
                                return '<span class="badge badge-warning">-</span></td>';
                            }
                        }
                    },
                    { "data": "info_diminta" },
                    { "data": "ket" }
                ],
                columnDefs: [
                    {
                        width: "150px",
                        targets: [0]
                    },
                    {
                        width: "250px",
                        targets: [1]
                    },
                    {
                        width: "530px",
                        orderable: false,
                        targets: [2]
                    },
                    {
                        width: "120px",
                        targets: [3]
                    },

                ],
                scrollCollapse: true,
                dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> INPUT',
                    searchPlaceholder: 'Ketik untuk cari...',
                    lengthMenu: '<span>Tampil:</span> MENU',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                }
            });
        }

        function resetFormtanggapan() {
            $("#form_tanggapan")[0].reset();
        }

        $(window).on('load', function () {
            loadData();

            {{-- Menampilkan Form Kirim beserta ISInya--}}
            $('#belumproses tbody').on('click', '#send', function (e) {
                var table = $('#belumproses').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_permintaan').val(data.id_permintaan).change();
                $('#id_user').val(data.users.id_user).change();
                $('#id_instansi').val(data.id_instansi).change();
                $('#nama').val(data.users.nama).change();
                $('#email').val(data.users.email).change();
                $('#instansi').val(data.instansi.instansi).change();
                $('#kirim_tanggapan').modal('toggle');
            } );

            $('#belumproses tbody').on('click', '#print', function (e) {
                var table = $('#belumproses').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                var id = data.id_permintaan;
                window.location.href = "{{ url('/rekap/belum')}}/"+id;
            } );

            $('#selesai tbody').on('click', '#print', function (e) {
                var table = $('#selesai').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                var id = data.id_permintaan;
                window.location.href = "{{ url('/rekap/selesai') }}/"+id;
            } );


            $('#belumproses tbody').on('click', '#edit', function (e) {
                var table = $('#belumproses').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $('#nama_pemohon').val(data.users.nama).attr('readonly', true).change();
                $('#no_ktp').val(data.users.no_ktp).attr('readonly', true).change();
                $('#alamat').val(data.users.alamat).attr('readonly', true).change();
                $('#notelp').val(data.users.no_telp).attr('readonly', true).change();
                $('#email').val(data.users.email).attr('readonly', true).change();
                $('#infobutuh').val(data.info_diminta).attr('readonly', true).change();
                $('#alasan').val(data.alasan).attr('readonly', true).change();
                $('#username').val(data.users.username).attr('readonly', true).change();
                $('#alasan_info').val(data.alasan_pengguna).attr('readonly', true).change();
                $('#tgl_minta').val(data.tgl_permintaan).attr('readonly', true).change();
                $("#submit_pengguna").attr("aksi","edit");
                $('#submit_pengguna').attr("idpermintaan",data.id_pengguna);
                $('#detail').modal('toggle');
            } );

        });

        {{-- Input Tanggapan--}}
        $('#submit_tanggapan').click(function () {
            var aksi = $("#submit_tanggapan").attr("aksi");
            $.ajax({
                url: "{{ url('/permintaan/input') }}",
                type: "post",
                data: new FormData($('#form_tanggapan')[0] ),
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
                        resetFormtanggapan();
                        $('#kirim_tanggapan').modal('toggle');
                        $('#belumproses').DataTable().ajax.reload();
                        $('#selesai').DataTable().ajax.reload();
                        $('#semua').DataTable().ajax.reload();
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

        $('#kirim_tanggapan').on('hidden.bs.modal', function () {
            resetFormtanggapan();
            $("#submit_tanggapan").attr("aksi");
        });

    </script>


@endsection