<?php

namespace App\Http\Controllers;

use App\Models\kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kasir = Kasir::all();
        return view('kasir/index', compact('kasir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kasir = new kasir;
        $kasir->nama_kasir = $request->input('nama_kasir');
        $kasir->jenis_kelamin = $request->input('jenis_kelamin');
        $kasir->alamat = $request->input('alamat');
        $kasir->no_telepon = $request->input('no_telepon');


        // delete img
        if ($request->hasFile('cover')) {
            $kasir->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/kasir', $name);
            $kasir->cover = $name;
        }

        $kasir->save();
        return redirect()->route('kasir.index')
            ->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasir = Kasir::findOrFail($id);
        return view('kasir.show', compact('kasir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kasir = Kasir::findOrFail($id);
        return view('kasir.edit', compact('kasir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasir = Kasir::findOrFail($id);
        $kasir->nama_kasir = $request->nama_kasir;
        $kasir->jenis_kelamin = $request->jenis_kelamin;
        $kasir->alamat = $request->alamat;
        $kasir->no_telepon = $request->no_telepon;
        $kasir->save();


        // delete img
        if ($request->hasFile('cover')) {
            $kasir->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/kasir', $name);
            $kasir->cover = $name;
        }
        return redirect()->route('kasir.index')
            ->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasir = Kasir::findOrFail($id);
        $kasir->delete();
        return redirect()->route(('kasir.index'));
    }
}
