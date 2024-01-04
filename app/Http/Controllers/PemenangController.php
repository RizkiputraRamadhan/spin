<?php

namespace App\Http\Controllers;

use App\Models\Hadiah;
use App\Models\Pembeli;
use App\Models\Pemenang;
use Illuminate\Http\Request;

class PemenangController extends Controller
{
    public function index()
    {
        $pemenangs = Pemenang::all();
        return view('admin.pemenang.index', compact('pemenangs'));
    }

    public function create()
    {
        // You may want to retrieve Hadiah and Pembeli data to populate dropdowns or other form elements
        $hadiahs = Hadiah::all();
        $pembelis = Pembeli::all();

        return view('admin.pemenang.create', compact('hadiahs', 'pembelis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hadiah_id' => 'required',
            'pembeli_id' => 'required',
        ]);

        Pemenang::create($request->all());

        return redirect()->route('pemenang.index')
            ->with('success', 'Pemenang created successfully');
    }

    public function destroy($id)
    {
        Pemenang::find($id)->delete();

        return redirect()->route('pemenang.index')
            ->with('success', 'Pemenang deleted successfully');
    }
}
