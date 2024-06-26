<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\merk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $merk = Merk::all();

        return view('barang.index', compact('barang', 'merk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merk = Merk::all();
        return view('barang/create', compact('merk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'id_merk' => 'required|exists:merks,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $barang = new Barang;
        $barang->nama_barang = $request->input('nama_barang');
        $barang->stok = $request->input('stok');
        $barang->harga = $request->input('harga');
        $barang->id_merk = $request->input('id_merk');

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/barang'), $filename);
            $barang->cover = $filename;

            $barang->save();
        }


        return redirect()->route('barang.index')
            ->with('success', 'data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $merk = Merk::all();
        return view('barang.edit', compact('barang', 'merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'id_merk' => 'required|exists:merks,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->id_merk = $request->id_merk;

        if ($request->hasFile('cover')) {
            // Delete old image
            if ($barang->cover && file_exists(public_path('images/barang/' . $barang->cover))) {
                unlink(public_path('images/barang/' . $barang->cover));
            }

            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/barang', $name);
            $barang->cover = $name;
        }

        $barang->save();

        return redirect()->route('barang.index')
            ->with('success', 'Data berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // Hapus gambar jika ada
        if ($barang->cover && file_exists(public_path('images/barang/' . $barang->cover))) {
            unlink(public_path('images/barang/' . $barang->cover));
        }

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus');
    }
}
