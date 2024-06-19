<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use App\Models\Barang;
use App\Models\Kasir;
use App\Models\Transaksi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Untuk Menampilkan data transaksi
        $transaksi = Transaksi::all();

        // Count untuk menghitung berapa banyak table yang kita bikan
        $merkCount = Merk::count();
        $barangCount = Barang::count();
        $kasirCount = Kasir::count();
        $transaksiCount = Transaksi::count();

        return view('home', compact('transaksi','merkCount', 'barangCount', 'kasirCount', 'transaksiCount'));
    }
}
