@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card no-b">
            <div class="card-body">
                <div class="card-title">Informasi</div>
                <button type="button" class="btn btn-primary btn-sm legitRipple" data-toggle="modal" data-target="#input_informasi">
                    <i class="icon-plus position-left"></i> Tambah
                    <span class="legitRipple-ripple" style="left: 36.5385%; top: 52.7778%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 211.643%;"></span>
                </button>
                <table class="table table-bordered " id="datatable">
                    <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Informasi</th>
                        <th>Instansi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Tanggal</th>
                        <th>Informasi</th>
                        <th>Instansi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div id="input_informasi" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Input Informasi</h5>
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
                                                <h6>Judul Informasi</h6>
                                                <input type="text" class="form-control" id="nama_info" name="nama_info">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <select class="custom-select select2" required id="id_kategori" name="id_kategori">
                                            <option value="">Pilih Kategori</option>
                                            <option></option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Ringkasan</h6>
                                                <textarea class="form-control" id="ringkasan" name="ringkasan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Penanggung Jawab Informasi</h6>
                                                <input type="text" class="form-control" id="penanggungjawab" name="penanggungjawab">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Tanggal Pembuatan Informasi</h6>
                                                <input type="text" class="date-time-picker form-control"
                                                       data-options='{"timepicker":false, "format":"Y-m-d"}' id="tanggal_buat" name="tanggal_buat">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Jangka Waktu Informasi</h6>
                                                <input type="text" class="date-time-picker form-control"
                                                       data-options='{"timepicker":false, "format":"Y-m-d"}' id="jangka_waktu" name="jangka_waktu">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="file" class="form-control" id="file_info" name="file_info">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                            <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_informasi">Simpan</button>
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

                "ajax": "{{ url('/informasi/data') }}",
                "columns": [
                    { "data": "tanggal_buat" },
                    { "data": "nama_info" },
                    { "data": "instansi.instansi" },
                    { "data": "status",
                        render: function(status){
                            if(status == '1'){
                                return '<span class="badge badge-success">Diverivikasi</span></td>';
                            }else{
                                return '<span class="badge badge-warning">Unverivied</span></td>';
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

        function resetFormInfo() {
            $("#form_informasi")[0].reset();
            $('#id_kegiatan').val("").change();
        }

        $(window).on('load', function () {
            loadData();
            $('#submit_informasi').click(function () {
                var aksi = $("#submit_informasi").attr("aksi");
                if(aksi=="input"){
                    $.ajax({
                        url: "{{ url('/informasi/input') }}",
                        type: "post",
                        data: new FormData($('#form_informasi')[0]),
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
                                resetFormInfo();
                                $('#input_informasi').modal('toggle');
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
                                text: 'Gagal Menambahkan Data TS',
                                type: 'error',
                                hide: true
                            });
                        }
                    });
                }else if(aksi=="edit"){
                    var id_ts= $("#submit_informasi").attr("idinfo");
                    $.ajax({
                        url: "{{ url('/informasi/edit') }}/"+id_info,
                        type: "post",
                        data: new FormData($('#form_informasi')[0]),
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
                                resetFormInfo();
                                $('#input_informasi').modal('toggle');
                                $('#datatable').DataTable().destroy();
                                loadData();

                            }else {
                                new PNotify({
                                    title: 'Warning',
                                    text: "Can't retrieve any data from server",
                                    hide: true
                                });
                                $('#submit_informasi').attr("data-aksi","input");
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
                    url: "{{ url('/informasi/change') }}/"+data.id_info,
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
                $('#nama_info').val(data.nama_info).change();
                $('#id_kategori').val(data.id_kategori).change();
                $('#ringkasan').val(data.ringkasan).change();
                $('#penanggungjawab').val(data.penanggungjawab).change();
                $('#tanggal_buat').val(data.tanggal_buat).change();
                $('#jangka_waktu').val(data.jangka_waktu).change();
                $("#submit_informasi").attr("aksi","edit");
                $('#submit_informasi').attr("idinfo",data.id_info);
                $('#input_informasi').modal('toggle');
            } );


            $('#datatable tbody').on('click', '#delete', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ url('/informasi/delete/') }}/" + data.id_info,
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
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                });
            });

            $.ajax({
                url: '{{ url('kategori/list') }}',
                dataType: "json",
                success: function(data) {
                    var kategori = jQuery.parseJSON(JSON.stringify(data));
                    $.each(kategori, function(k, v) {
                        $('#id_kategori').append($('<option>', {value:v.id_kategori}).text(v.kategori))
                    })
                }
            });


            $('#input_informasi').on('hidden.bs.modal', function () {
                resetFormInfo();
                $("#submit_informasi").attr("aksi","input");
                $('#submit_informasi').removeAttr("idts");
            });
            $('#input_informasi').on('show.bs.modal', function () {

            });
            $('#pengelolaan').addClass("nav-item-open");
            $('#manage-ts').addClass("active");
        })
    </script>
@endsection