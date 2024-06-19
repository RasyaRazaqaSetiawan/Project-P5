<?php

namespace App\Http\Controllers;

use App\Models\merk;

use Illuminate\Http\Request;

// class
class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  method
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // property dan object 
        $merk = Merk::all();
        return view('merk/index', compact('merk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merk.create');
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
            'nama_merk' => 'required|unique:merks,nama_merk',    // Memastikan nama_merk adalah unik di tabel merks
        ], [
            'nama_merk.unique' => 'Nama Merk sudah terisi'
        ]);

        $merk = new Merk;
        $merk->nama_merk = $request->input('nama_merk');
        $merk->save();
        return redirect()->route('merk.index')->with('success', 'Data berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merk = Merk::findOrFail($id);
        return view('merk.show', compact('merk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $merk = Merk::findOrFail($id);
        return view('merk.edit', compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $merk = Merk::findOrFail($id);
        $merk->nama_merk = $request->nama_merk;
        $merk->save();

        return redirect()->route('merk.index')
            ->with('success', 'data berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merk = Merk::findOrFail($id);

        $merk->delete();
        return redirect()->route(('merk.index'))
            ->with('success', 'data berhasil di hapus');
    }
}
