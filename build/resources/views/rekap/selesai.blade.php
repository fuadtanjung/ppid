<!DOCTYPE html>
<html>
<head>
    <title>Cetak Form Permintaan</title>
</head>
<body>
<table align="center">
    <tr>
        <td width="100px">
        <td width="100px">
            <img src="/ppid_new/assets/dashboard/img/logo.jpg" alt="" height="80px" />
        </td>
        </td>
        <td text-align="center">
            <span style="font-size:38px;padding:0px">PEMERINTAH KOTA PADANG</span><br />
            <span style="font-size:20px; padding:0px">PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI </span><br />
            <span style="font-size:13px;"> &nbsp;Jl. Bagindo Aziz Chan, Komplek Perkantoran Balai Kota Padang - Aie Pacah - Padang</span>
        </td>
    </tr>
</table>
<hr style="height:2px; color:#000; margin-top:0px;" />
<p style="font-size:17px; text-align:center;">
    Rekap Data Permintaan Informasi<br />
</p>
<p>

</p>
<table border="1" style="border-spacing:0">
    <thead>
    <tr>
        <th width="200px" align="center">Nama Pemohon</th>
        <th width="500px" align="center">Info diminta</th>
        <th align="center">Tanggal Permintaan</th>
        <th align="center">Konfirmasi</th>
        <th align="center">Ket</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td>{{ $permintaan->pengguna_info }}</td>
        <td>{{ $permintaan->info_diminta }}</td>
        <td>{{ $permintaan->tgl_permintaan }}</td>
        <td>{{ $permintaan->konfirmasi }}</td>
        <td>{{$permintaan->ket}}</td>
    </tr>
    </tbody>
</table>
</body>
</html>