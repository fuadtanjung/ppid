@extends('layouts.navberanda')
@section('title')
    Beranda
@endsection
@section('content')
            <div role="main" class="main">
                <div class="slider-container light rev_slider_wrapper" style="height: 650px;">
                    <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8">
                        <ul>
                            <li data-transition="fade">
                                <img src="{{ url('assets/img/kantor.png')}}"  
                                    alt=""
                                    data-bgposition="center center" 
                                    data-bgfit="cover" 
                                    data-bgrepeat="no-repeat" 
                                    class="rev-slidebg">                                                                
                            </li>                            
                        </ul>
                    </div>
                </div>
                
                <section class="section bg-color-light border-0 m-0">
                    <div class="container">
                        <div class="featured-boxes featured-boxes-flat">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                                    <div class="featured-box featured-box-primary featured-box-effect-2">
                                        <div class="box-content box-content-border-bottom">
                                            <i class="icon-featured far icon-docs"></i>
                                            <h4 class="font-weight-normal text-5 mt-3">Berkas <strong class="font-weight-extra-bold">Informasi</strong></h4>
                                            <p class="font-weight-normal text-5 mt-3">{{$countInfo}} Berkas</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                                    <div class="featured-box featured-box-secondary featured-box-effect-2">
                                        <div class="box-content box-content-border-bottom">
                                            <i class="icon-featured far icon-book-open"></i>
                                            <h4 class="font-weight-normal text-5 mt-3">Permintaan <strong class="font-weight-extra-bold">Informasi</strong></h4>
                                            <p class="font-weight-normal text-5 mt-3">{{$countMinta}} Permintaan</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                                    <div class="featured-box featured-box-tertiary featured-box-effect-2">
                                        <div class="box-content box-content-border-bottom">
                                            <i class="icon-featured far icon-user-following"></i>
                                            <h4 class="font-weight-normal text-5 mt-3">Pengguna <strong class="font-weight-extra-bold">Terdaftar</strong></h4>
                                            <p class="font-weight-normal text-5 mt-3">{{$countUser}} Pendaftar</p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </section>

                <!--Post-->
                <section class="section section-height-3 bg-primary border-0 m-0 appear-animation" data-appear-animation="fadeIn">
                    <div class="container">
                        <div class="row">
                            <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                                <h2 class="font-weight-bold text-color-light text-6 mb-4">Berita Terbaru</h2>
                            </div>
                        </div>
                        <div class="row recent-posts appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <article>
                                    <div class="row">
                                        <div class="col">
                                            <a href="blog-post.html" class="text-decoration-none">
                                                <img src="{{ url('assets/img/blog/blog-corporate-3-1.jpg')}}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="date">
                                                <span class="day bg-color-light text-color-dark font-weight-extra-bold">15</span>
                                                <span class="month bg-color-light font-weight-semibold text-color-primary text-1">JAN</span>
                                            </div>
                                        </div>
                                        <div class="col pl-1">
                                            <h4 class="line-height-3 text-4"><a href="blog-post.html" class="text-light">Launching Aplikasi PPID Kota Padang</a></h4>
                                            <p class="text-color-light line-height-5 opacity-6 pr-4 mb-1">PADANG – Sesuai dengan amanat Undang-Undang (UU) No.14 tahun 2008 tentang Keterbukaan Informasi Publik (KIP) oleh Kem ...</p>
                                            <a href="https://preview.oklerthemes.com/" class="read-more text-color-light font-weight-semibold text-2">read more <i class="fas fa-chevron-right text-1 ml-1"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <article>
                                    <div class="row">
                                        <div class="col">
                                            <a href="blog-post.html" class="text-decoration-none">
                                                <img src="{{ url('assets/img/blog/blog-corporate-3-2.jpg')}}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="date">
                                                <span class="day bg-color-light text-color-dark font-weight-extra-bold">14</span>
                                                <span class="month bg-color-light font-weight-semibold text-color-primary text-1">JAN</span>
                                            </div>
                                        </div>
                                        <div class="col pl-1">
                                            <h4 class="line-height-3 text-4"><a href="blog-post.html" class="text-light">AKSI PENUMBUHAN WIRAUSAHA BARU BUTUH MASUKAN</a></h4>
                                            <p class="text-color-light line-height-5 opacity-6 pr-4 mb-1">Padang,—Dalam konteks dan pengalaman di Kota Padang menunjukkan bahwa sebahagian besar pelaku ekonomi ...</p>
                                            <a href="https://preview.oklerthemes.com/" class="read-more text-color-light font-weight-semibold text-2">read more <i class="fas fa-chevron-right text-1 ml-1"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                                <article>
                                    <div class="row">
                                        <div class="col">
                                            <a href="blog-post.html" class="text-decoration-none">
                                                <img src="{{ url('assets/img/blog/blog-corporate-3-3.jpg')}}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="date">
                                                <span class="day bg-color-light text-color-dark font-weight-extra-bold">13</span>
                                                <span class="month bg-color-light font-weight-semibold text-color-primary text-1">JAN</span>
                                            </div>
                                        </div>
                                        <div class="col pl-1">
                                            <h4 class="line-height-3 text-4"><a href="blog-post.html" class="text-light">SMAN 6 PADANG DINILAI TIM PENILAI LOMBA SEKOLAH SEHAT</a></h4>
                                            <p class="text-color-light line-height-5 opacity-6 pr-4 mb-1">PADANG–Kota Padang memperoleh kesempatan mengutus 4 (empat) sekolah ikut berlomba sekolah sehat tingkat Provinsi ...</p>
                                            <a href="https://preview.oklerthemes.com/" class="read-more text-color-light font-weight-semibold text-2">read more <i class="fas fa-chevron-right text-1 ml-1"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <article>
                                    <div class="row">
                                        <div class="col">
                                            <a href="blog-post.html" class="text-decoration-none">
                                                <img src="{{ url('assets/img/blog/blog-corporate-3-4.jpg')}}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="date">
                                                <span class="day bg-color-light text-color-dark font-weight-extra-bold">12</span>
                                                <span class="month bg-color-light font-weight-semibold text-color-primary text-1">JAN</span>
                                            </div>
                                        </div>
                                        <div class="col pl-1">
                                            <h4 class="line-height-3 text-4"><a href="blog-post.html" class="text-light">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                            <p class="text-color-light line-height-5 opacity-6 pr-4 mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <a href="https://preview.oklerthemes.com/" class="read-more text-color-light font-weight-semibold text-2">read more <i class="fas fa-chevron-right text-1 ml-1"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </section>
                <!--End Post-->

                <section class="section section-height-3 bg-color-grey-scale-1 m-0 border-0">
                    <div class="container">

                      
                    <div class="row">
                        <div class="col">
                            <section class="card card-admin">

                                <header class="card-header">
                                    <div class="card-actions">
                                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                                    </div>
                                    
                                    <h2 class="card-title">Informasi Tersedia</h2>
                                </header>
                                <div class="card-body">
                                    <table class="table table-bordered " id="datatable">
                                        <thead>
                                        <tr>
                                            <th>Informasi</th>
                                            <th>Instansi</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Informasi</th>
                                            <th>Instansi</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>

                        
                    </div>
                </section>
            </div>
@endsection

@section('jsoperation')

    <script src="{{ url('assets/dashboard/js/pnotify.custom.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/inputmask.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/plugins/mask/dist/jquery.mask.js') }}"></script>
    <script type="text/javascript">
        function loadData() {
            $('#datatable').dataTable({

                "ajax": "{{ url('/beranda/data') }}",
                "columns": [
                    { "data": "nama_info" },
                    { "data": "instansi.instansi" },
                    { "data": "action" }
                ],
                columnDefs: [
                    {
                        width: "250px",
                        targets: [0]
                    },
                    {
                        width: "250px",
                        targets: [1]
                    },
                    {
                        width: "100px",
                        targets: [2]
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
        })

    </script>
@endsection
