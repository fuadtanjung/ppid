@extends('layouts.app')
@section('content')

    <div class="col-lg-12">
        <div class="card no-b">
            <div class="card-body">
                <div class="card-title">Balasan</div>
                <table class="table table-bordered " id="datatable">
                    <thead>
                    <tr>
                        <th>Istansi Terkait</th>
                        <th>Tanggapan</th>
                        <th>Pesan</th>
                        <th>Tanggal Dibalas</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Istansi Terkait</th>
                        <th>Tanggapan</th>
                        <th>Pesan</th>
                        <th>Tanggal Dibalas</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div id="data_view" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">DETAIL</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form id="form_informasi" class="form-material">
                                {{ csrf_field() }}
                                <legend class="text-semibold">Data Informasi</legend>
                                <br>
                                <div class="row clearfix">

                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Email Pengguna</h6>
                                                <input type="text" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Alasan</h6>
                                                <textarea type="text" class="form-control" id="alasan" name="alasan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Alasan Pengguna</h6>
                                                <textarea type="text" class="form-control" id="alasan_pengguna" name="alasan_pengguna"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Tanggal Diajukan</h6>
                                                <input type="text" class="form-control" id="tgl_diajukan" name="tgl_diajukan">
                                            </div>
                                        </div>
                                    </div>

                                        <br><br><br>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Pesan</h6>
                                                <textarea type="text" class="form-control" id="pesan" name="pesan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Dari Instansi</h6>
                                                <input type="text" class="form-control" id="instansi" name="instansi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Tanggal Dibalas</h6>
                                                <input type="text" class="form-control" id="tgl_dibalas" name="tgl_dibalas">
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

                "ajax": "{{ url('/balasan/data') }}",
                "columns": [
                    { "data": "instansi.instansi" },
                    { "data": "permintaan.info_diminta" },
                    { "data": "pesan" },
                    { "data": "permintaan.tgl_konfirm" },
                    { "data": "action" }
                ],
                columnDefs: [
                    {
                        width: "250px",
                        targets: [0]
                    },
                    {
                        width: "200px",
                        targets: [1]
                    },
                    {
                        width: "200px",
                        targets: [2]
                    },
                    {
                        width: "250px",
                        targets: [3]
                    },
                    {
                        width: "80px",
                        targets: [4]
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


        $(window).on('load', function () {
            loadData();

            $('#datatable tbody').on('click', '#view', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $('#email').val(data.permintaan.email).change();
                $('#alasan').val(data.permintaan.alasan).change();
                $('#alasan_pengguna').val(data.permintaan.alasan_pengguna).change();
                $('#tgl_diajukan').val(data.permintaan.tgl_permintaan).change();
                $('#pesan').val(data.pesan).change();
                $('#instansi').val(data.instansi.instansi).change();
                $('#tgl_dibalas').val(data.permintaan.tgl_konfirm).change();
                $('#data_view').modal('toggle');
            } );

        })



    </script>

@endsection