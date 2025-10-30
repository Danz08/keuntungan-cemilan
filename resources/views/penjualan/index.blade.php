@extends('layouts.main')

@section('content')
<h4>Penjualan</h4>
<a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>

<table class="table table-striped">
<thead><tr><th>No</th><th>Produk</th><th>Tanggal</th><th>Jumlah</th><th>Pendapatan</th><th>Keuntungan</th><th>Aksi</th></tr></thead>
<tbody>
@forelse($penjualan as $p)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $p->produk->nama_produk }}</td>
<td>{{ $p->tanggal }}</td>
<td>{{ $p->jumlah_terjual }}</td>
<td>Rp {{ number_format($p->total_pendapatan,0,',','.') }}</td>
<td>Rp {{ number_format($p->keuntungan,0,',','.') }}</td>
<td>
    <a href="{{ route('penjualan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
    <form action="{{ route('penjualan.destroy', $p->id) }}" method="POST" style="display:inline-block">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
    </form>
</td>
</tr>
@empty
<tr><td colspan="7" class="text-center">Belum ada data</td></tr>
@endforelse
</tbody>
</table>
@endsection
