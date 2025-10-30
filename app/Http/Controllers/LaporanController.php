<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\PembelianBahan;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // filter tanggal opsional
        $start = $request->query('start');
        $end = $request->query('end');

        $queryPenjualan = Penjualan::query();
        $queryPembelian = PembelianBahan::query();

        if ($start && $end) {
            $queryPenjualan->whereBetween('tanggal', [$start, $end]);
            $queryPembelian->whereBetween('tanggal_pembelian', [$start, $end]);
        }

        $total_pendapatan = $queryPenjualan->sum('total_pendapatan');
        $total_modal = $queryPembelian->sum('total') + $queryPenjualan->sum('total_modal');
        $total_keuntungan = $queryPenjualan->sum('keuntungan');
        $surplus = $total_pendapatan - $total_modal;

        // opsi: simpan ke tabel laporan (jika ingin)
        // Laporan::create([ ... ]);

        // data penjualan per produk untuk tabel/diagram
        $penjualan_per_produk = DB::table('penjualan')
            ->join('produk','penjualan.produk_id','produk.id')
            ->select('produk.nama_produk', DB::raw('SUM(penjualan.jumlah_terjual) as jumlah'), DB::raw('SUM(penjualan.total_pendapatan) as pendapatan'))
            ->groupBy('produk.nama_produk')
            ->get();

        return view('laporan.index', compact('total_pendapatan','total_modal','total_keuntungan','surplus','penjualan_per_produk','start','end'));
    }
}