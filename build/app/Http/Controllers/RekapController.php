<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permintaan;
class RekapController extends Controller
{
    public function belum($id)
    {
        $permintaan = Permintaan::where('id_permintaan', $id)->first();
        return view('rekap.belum', compact('permintaan', $permintaan));
    }

    public function selesai($id)
    {
        $permintaan = Permintaan::where('id_permintaan', $id)->first();
        return view('rekap.selesai', compact('permintaan', $permintaan));
    }

    public function semua(Request $request)
    {
        $mulai = $request->start;
        $akhir = $request->end;
        $ket = $request->inputstatus;

        if ($ket == 'semua') {
            $permintaan = Permintaan::orWhereBetween('tgl_permintaan', [$mulai, $akhir])
                ->orwhere('ket', 'like', 'belum')
                ->orwhere('ket', 'like', 'selesai')
                ->get();
        }else{
            $permintaan = Permintaan::WhereBetween('tgl_permintaan', [$mulai, $akhir])
                ->orwhere('ket', 'like', $ket)
                ->get();
            }
            return view('rekap.laporan', compact('permintaan', $permintaan));
    }
}