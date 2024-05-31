<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Kasir;
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
        return view('transaksi.index', compact('transaksi'));
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
        // Buat transaksi baru
        $transaksi = new Transaksi;
        $transaksi->tanggal_pembelian = $request->tanggal_pembelian;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->id_kasir = $request->id_kasir;
        $transaksi->jumlah = $request->jumlah;

        // Ambil harga barang dari database
        $barang = Barang::findOrFail($transaksi->id_barang);
        $transaksi->total = $barang->harga * $transaksi->jumlah;

        // Mengurangi stok barang
        $barang->stok -= $transaksi->jumlah;
        $barang->save();

        // Simpan transaksi
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $barang = Barang::all();
        $kasir = Kasir::all();
        return view('transaksi.edit', compact('transaksi', 'barang', 'kasir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->tanggal_pembelian = $request->tanggal_pembelian;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->id_kasir = $request->id_kasir;
        $transaksi->jumlah = $request->jumlah;

        // Ambil harga barang dari database
        $barang = Barang::findOrFail($transaksi->id_barang);
        $transaksi->total = $barang->harga * $transaksi->jumlah;

        // Simpan perubahan transaksi
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data berhasil dihapus');
    }
}
