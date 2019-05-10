@extends('layouts.mainapp')
@section('menu')

    @auth('users')
    <ul class="sidebar-menu">
        <li class="treeview">
            <a href="#">
                <i class="icon icon-info-circle s-24"></i> <span>Informasi</span>
                <i class=" icon-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('informasi') }}"><i class="icon icon-circle-o"></i>Daftar Informasi</a>
                <li><a href="{{ url('kategori') }}"><i class="icon icon-circle-o"></i>Kategori</a>
                </li>
            </ul>
        </li>
        <li class="treeview ">
            <a href="#">
                <i class="icon icon-account_box s-24"></i> <span>Pengaturan Akun</span>
                <i class=" icon-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('pengelola') }}"><i class="icon icon-circle-o"></i>Pengelola</a>
                <li><a href="{{ url('pengguna') }}"><i class="icon icon-circle-o"></i>Pengguna</a>
                </li>
            </ul>
        </li>
        <li class="treeview ">
            <a href="{{ url('permintaan') }}">
                <i class="icon icon-exchange s-24"></i> <span>Permintaan</span>
            </a>
        </li>

        <li class="treeview">
            <a href="{{ url('instansi') }}">
                <i class="icon icon-account_balance s-24"></i> <span>Instansi</span>
            </a>
        </li>
        <li class="treeview">
            <a href="{{ url('log') }}">
                <i class="icon icon-check2 s-24"></i> <span>History Balasan</span>
            </a>
        </li>
    </ul>
    @endauth

    @auth('pengguna')
        <ul class="sidebar-menu">
            <li class="treeview ">
                <a href="{{ url('profil') }}">
                    <i class="icon icon-info-circle s-24"></i> <span>Profil User</span>
                </a>
            </li>
            <li class="treeview ">
                <a href="{{ url('balasan') }}">
                    <i class="icon icon-info-circle s-24"></i> <span>Pemberitahuan</span>
                </a>
            </li>
        </ul>
    @endauth
@endsection