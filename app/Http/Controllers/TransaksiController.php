<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Merk;
use App\Models\Barang;
use App\Models\Kasir;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $merk = Merk::all();
        $barang = Barang::all();
        $kasir = Kasir::all();
        return view('transaksi.create', compact('barang', 'kasir', 'merk')); // Mengirimkan variabel ke view
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'id_merk' => 'required|exists:merks,id',
            'id_barang' => 'required|exists:barangs,id',
            'id_kasir' => 'required|exists:kasirs,id',
            'jumlah' => 'required|integer|min:1',
        ]);
        
        
        // Ambil barang dari database
        $barang = Barang::findOrFail($request->id_barang);

        // Periksa apakah stok mencukupi
        if ($barang->stok < $request->jumlah) {
            return redirect()->route('transaksi.index')->with('error', 'Stok tidak mencukupi!');
        }

        // Buat transaksi baru
        $transaksi = new Transaksi;
        $transaksi->tanggal_pembelian = $request->tanggal_pembelian;
        $transaksi->id_merk = $request->id_merk;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->id_kasir = $request->id_kasir;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->cover = $barang->cover; // Mengambil cover dari tabel Barang
        $transaksi->total = $barang->harga * $transaksi->jumlah;

        // Mengurangi stok barang
        $barang->stok -= $transaksi->jumlah;
        $barang->save();

        // Simpan transaksi
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        // Model
        $merk = Merk::all();
        $barang = Barang::all();
        $kasir = Kasir::all();
        return view('transaksi.show', compact('transaksi', 'barang', 'kasir', 'merk'));
    }


    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $merk = Merk::all();
        $barang = Barang::all();
        $kasir = Kasir::all();
        return view('transaksi.edit', compact('transaksi', 'barang', 'kasir', 'merk'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'id_merk' => 'required|exists:merks,id',
            'id_barang' => 'required|exists:barangs,id',
            'id_kasir' => 'required|exists:kasirs,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Simpan nilai jumlah sebelum diubah
        $jumlahSebelumnya = $transaksi->jumlah;

        // Ambil barang dari database
        $barang = Barang::findOrFail($request->id_barang);

        // Jika jumlah barang diubah, perbarui nilai total transaksi dan stok barang
        if ($jumlahSebelumnya != $request->jumlah) {
            // Periksa apakah stok mencukupi
            if ($barang->stok + $jumlahSebelumnya < $request->jumlah) {
                return redirect()->route('transaksi.index')->with('error', 'Stok tidak mencukupi!');
            }

            // Kembalikan stok sebelumnya
            $barang->stok += $jumlahSebelumnya;
            $barang->stok -= $request->jumlah;
            $barang->save();
        }

        $transaksi->tanggal_pembelian = $request->tanggal_pembelian;
        $transaksi->id_merk = $request->id_merk;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->id_kasir = $request->id_kasir;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->total = $barang->harga * $request->jumlah;

        // Simpan perubahan transaksi
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($transaksi)
    {
        $transaksi = Transaksi::findOrFail($transaksi);

        // Mengembalikan stok barang
        $barang = Barang::findOrFail($transaksi->id_barang);
        $barang->stok += $transaksi->jumlah;
        $barang->save();

        // Hapus transaksi
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
