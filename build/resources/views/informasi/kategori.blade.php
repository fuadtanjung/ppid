@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card no-b">
            <div class="card-body">
                <div class="card-title">Kategori</div>
                <button type="button" class="btn btn-primary btn-sm legitRipple" data-toggle="modal" data-target="#input_kategori">
                    <i class="icon-plus position-left"></i> Tambah
                    <span class="legitRipple-ripple" style="left: 36.5385%; top: 52.7778%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 211.643%;"></span>
                </button>
                <table class="table table-bordered " id="datatable">
                    <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div id="input_kategori" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Input Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form id="form_kategori" class="form-material">
                                {{ csrf_field() }}
                                <legend class="text-semibold">Data Kategori</legend>
                                <br>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <h6>Nama Kategori</h6>
                                                <input type="text" class="form-control" id="kategori" name="kategori">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                            <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_kategori">Simpan</button>
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

                "ajax": "{{ url('/kategori/data') }}",
                "columns": [
                    { "data": "kategori" },
                    { "data": "action" }
                ],
                columnDefs: [
                    {
                        width: "1000px",
                        targets: [0]
                    },
                    {
                        width: "80px",
                        targets: [1]
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

        function resetFormKat() {
            $("#form_kategori")[0].reset();
            $('#id_kegiatan').val("").change();
        }

        $(window).on('load', function () {
            loadData();
            $('#submit_kategori').click(function () {
                var aksi = $("#submit_kategori").attr("aksi");
                if(aksi=="input"){
                    $.ajax({
                        url: "{{ url('/kategori/input') }}",
                        type: "post",
                        data: new FormData($('#form_kategori')[0]),
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
                                resetFormKat();
                                $('#input_kategori').modal('toggle');
                                $('#datatable').DataTable().destroy();
                                loadData()
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
                }
                else if(aksi=="edit"){
                    var id_kategori = $("#submit_kategori").attr("idkategori");
                    $.ajax({
                        url: "{{ url('/kategori/edit') }}/"+id_kategori,
                        type: "post",
                        data: new FormData($('#form_kategori')[0]),
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
                                resetFormKat();
                                $('#input_kategori').modal('toggle');
                                $('#datatable').DataTable().destroy();
                                loadData();

                            }else {
                                new PNotify({
                                    title: 'Warning',
                                    text: "Can't retrieve any data from server",
                                    hide: true
                                });
                                $('#submit_kategori').attr("data-aksi","input");
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

            $('#datatable tbody').on('click', '#edit', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $('#kategori').val(data.kategori).change();
                $("#submit_kategori").attr("aksi","edit");
                $('#submit_kategori').attr("idkategori",data.id_kategori);
                $('#input_kategori').modal('toggle');
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
                            url: "{{ url('/kategori/delete/') }}/" + data.id_kategori,
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


            $('#input_kategori').on('hidden.bs.modal', function () {
                resetFormKat();
                $("#submit_kategori").attr("aksi","input");
            });

        })
    </script>
@endsection