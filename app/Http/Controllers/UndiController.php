<?php

namespace App\Http\Controllers;

use App\Models\Hadiah;
use App\Models\Pembeli;
use App\Models\Pemenang;
use Illuminate\Http\Request;

class UndiController extends Controller
{
    public function index()
    {
        $hadiah = Hadiah::all();
        $pembeli = Pembeli::all();
        return view('home', [
            'hadiah' => $hadiah,
            'pembeli' => $pembeli,
        ]);
    }

    public function undi(Request $request)
    {
        $voucherCode = $request->input('voucher');
        $noTlp = $request->input('phone');

        $pembeli = Pembeli::where('nomer_hp', $noTlp)->first();
        $hadiah = Hadiah::where('code_voucer', $voucherCode)->first();

        if ($hadiah && $pembeli) {
            Pemenang::create([
                'hadiah' => $hadiah->nama,
                'notlp' => $request->phone,
            ]);
            return redirect()
                ->back()
                ->with('selamat', $hadiah->nama);
        } else {
            return redirect()
                ->back()
                ->with('gagalUndi', '.');
        }
    }
}
