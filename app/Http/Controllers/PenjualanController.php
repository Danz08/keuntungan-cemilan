<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('produk')->orderBy('tanggal','desc')->get();
        $produk = Produk::orderBy('nama_produk')->get();
        return view('penjualan.index', compact('penjualan','produk'));
    }

    public function create()
    {
        $produk = Produk::orderBy('nama_produk')->get();
        return view('penjualan.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'tanggal' => 'required|date',
            'jumlah_terjual' => 'required|integer|min:1'
        ]);

        $produk = Produk::findOrFail($data['produk_id']);
        $jumlah = $data['jumlah_terjual'];

        // hitung total modal, total pendapatan, keuntungan
        $total_modal = $produk->harga_modal * $jumlah;
        $total_pendapatan = $produk->harga_jual * $jumlah;
        $keuntungan = $total_pendapatan - $total_modal;

        // simpan penjualan
        Penjualan::create([
            'produk_id' => $produk->id,
            'tanggal' => Carbon::parse($data['tanggal'])->toDateString(),
            'jumlah_terjual' => $jumlah,
            'total_modal' => $total_modal,
            'total_pendapatan' => $total_pendapatan,
            'keuntungan' => $keuntungan,
        ]);

        // kurangi stok produk (jika memakai stok)
        if (is_numeric($produk->stok)) {
            $produk->stok = max(0, $produk->stok - $jumlah);
            $produk->save();
        }

        return redirect()->route('penjualan.index')->with('success','Penjualan dicatat');
    }

    public function show(Penjualan $penjualan)
    {
        return view('penjualan.show', compact('penjualan'));
    }

    public function edit(Penjualan $penjualan)
    {
        $produk = Produk::orderBy('nama_produk')->get();
        return view('penjualan.edit', compact('penjualan','produk'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $data = $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'tanggal' => 'required|date',
            'jumlah_terjual' => 'required|integer|min:1'
        ]);

        $produk = Produk::findOrFail($data['produk_id']);
        $jumlah = $data['jumlah_terjual'];

        $total_modal = $produk->harga_modal * $jumlah;
        $total_pendapatan = $produk->harga_jual * $jumlah;
        $keuntungan = $total_pendapatan - $total_modal;

        $penjualan->update([
            'produk_id' => $produk->id,
            'tanggal' => $data['tanggal'],
            'jumlah_terjual' => $jumlah,
            'total_modal' => $total_modal,
            'total_pendapatan' => $total_pendapatan,
            'keuntungan' => $keuntungan,
        ]);

        return redirect()->route('penjualan.index')->with('success','Penjualan diperbarui');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success','Penjualan dihapus');
    }
}
