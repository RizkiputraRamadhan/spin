<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;

class PembeliController extends Controller
{
    public function index()
    {
        $pembelis = Pembeli::all();
        return view('admin.pembeli.index', [
            'pembelis' => $pembelis
        ]);
    }

    public function create()
    {
        return view('admin.pembeli.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomer_hp' => 'required',
            'code_voucer' => 'nullable',
        ]);

        Pembeli::create($request->all());

        return redirect('/pembeli')
            ->with('success', 'Pembeli created successfully');
    }


    public function delete($id)
    {
        Pembeli::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Pembeli deleted successfully');
    }
}
