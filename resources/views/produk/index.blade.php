@extends('layouts.main')

@section('content')
<h4>Produk</h4>
<a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

<table class="table table-striped">
<thead>
<tr><th>No</th><th>Nama</th><th>Kategori</th><th>Harga Modal</th><th>Harga Jual</th><th>Stok</th><th>Aksi</th></tr>
</thead>
<tbody>
@forelse($produk as $p)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $p->nama_produk }}</td>
<td>{{ $p->kategori }}</td>
<td>Rp {{ number_format($p->harga_modal,0,',','.') }}</td>
<td>Rp {{ number_format($p->harga_jual,0,',','.') }}</td>
<td>{{ $p->stok }}</td>
<td>
    <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
    <form action="{{ route('produk.destroy', $p->id) }}" method="POST" style="display:inline-block">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
    </form>
</td>
</tr>
@empty
<tr><td colspan="7" class="text-center">Belum ada produk</td></tr>
@endforelse
</tbody>
</table>
@endsection
