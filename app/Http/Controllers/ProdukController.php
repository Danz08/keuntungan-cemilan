<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('nama_produk')->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:50',
            'harga_modal' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'nullable|integer',
            'keterangan' => 'nullable|string'
        ]);
        Produk::create($data);
        return redirect()->route('produk.index')->with('success','Produk ditambahkan');
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:50',
            'harga_modal' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'nullable|integer',
            'keterangan' => 'nullable|string'
        ]);
        $produk->update($data);
        return redirect()->route('produk.index')->with('success','Produk diperbarui');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success','Produk dihapus');
    }
}
