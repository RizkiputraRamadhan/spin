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
        $hadiah = Hadiah::inRandomOrder()
            ->take(8)
            ->get();
        $pembeli = Pembeli::all();

        $halfCount = $hadiah->count() / 2;
        $topHadiah = $hadiah->slice(0, $halfCount);
        $bottomHadiah = $hadiah->slice($halfCount);
        return view('home', [
            'topHadiah' => $topHadiah,
            'bottomHadiah' => $bottomHadiah,
            'pembeli' => $pembeli,
            'hadiah' => $hadiah,
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
            $undianBerhasil = true;

            return redirect()
                ->back()
                ->with('undianBerhasil', $undianBerhasil);
        } else {
            return redirect()
                ->back()
                ->with('gagalUndi', '.');
        }
    }
}
