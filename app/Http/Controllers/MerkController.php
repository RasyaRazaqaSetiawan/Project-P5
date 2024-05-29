<?php

namespace App\Http\Controllers;

use App\Models\merk;

use Illuminate\Http\Request;

class MerkController extends Controller
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
        $merk = Merk::all();
        return view('merks/index', compact('merk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $merk = new Merk;
        $merk->nama_merk = $request->input('nama_merk');
        $merk->save();
        return redirect()->route('merk.index')
        ->with('success', 'data berhasil ditambahkan');
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
        return view('merks.show', compact('merk'));
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
        return view('merks.edit', compact('merk'));
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


        // delete img
        if ($request->hasFile('cover')) {
            $merk->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/$merk', $name);
            $merk->cover = $name;
        }

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
        return redirect()->route(('merk.index'));
    }
}
