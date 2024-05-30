<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\barang;
use App\Models\kasir;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi/index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $kasir = Kasir::all();
        return view('transaksi.create', compact('barang', 'kasir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new transaksi;
        $transaksi->tanggal_pembelian = $request->tanggal_pembelian;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->id_kasir = $request->id_kasir;
        $transaksi->jumlah = $request->jumlah;

        // update img
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/transaksi', $name);
            $transaksi->cover = $name;
        }
        $transaksi->save();
        return redirect()->route('transaksi.index')->with('success', 'Data berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $barang = Barang::all();
        $kasir = Kasir::all();
        return view('transaksi.edit', compact('transaksi', 'barang', 'kasir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->tanggal_pembelian = $request->tanggal_pembelian;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->id_kasir = $request->id_kasir;
        $transaksi->jumlah = $request->jumlah;

        // delete img
        if ($request->hasFile('cover')) {
            $transaksi->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/transaksi', $name);
            $transaksi->cover = $name;
        }

        $transaksi->save();
        return redirect()->route('transaksi.index')
            ->with('success', 'data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route(('transaksi.index'))
            ->with('success', 'data berhasil di hapus');
    }
}
