<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianBahan;

class PembelianController extends Controller
{
    public function index()
{
    $pembelian_bahan = PembelianBahan::all();
    return view('pembelian.index', ['pembelian' => $pembelian_bahan]);
}


    public function create()
    {
        return view('pembelian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'tanggal_pembelian' => 'required|date',
        ]);

        $total = $request->jumlah * $request->harga_satuan;

        PembelianBahan::create([
            'nama_bahan' => $request->nama_bahan,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total' => $total,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]);

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $pembelian_bahan = PembelianBahan::findOrFail($id);
        $pembelian_bahan->delete();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus');
    }
}
