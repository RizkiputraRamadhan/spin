<?php
// app/Http/Controllers/HadiahController.php

namespace App\Http\Controllers;

use App\Models\Hadiah;
use Illuminate\Http\Request;

class HadiahController extends Controller
{
    public function index()
    {
        $hadiahs = Hadiah::inRandomOrder()->take(6)->get();
        return view('admin.hadiah.index', compact('hadiahs'));
    }

    public function create()
    {
        return view('admin.hadiah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'code_voucer' => 'nullable',
        ]);

        Hadiah::create($request->all());

        return redirect()->route('hadiah.index')
            ->with('success', 'Hadiah created successfully');
    }

    public function destroy($id)
    {
        Hadiah::find($id)->delete();

        return redirect()->route('hadiah.index')
            ->with('success', 'Hadiah deleted successfully');
    }



}
