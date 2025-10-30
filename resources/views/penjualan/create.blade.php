@extends('layouts.main')

@section('content')
<h4>Tambah Penjualan</h4>
<form action="{{ route('penjualan.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Produk</label>
        <select name="produk_id" class="form-control" required>
            <option value="">-- Pilih --</option>
            @foreach($produk as $pr)
                <option value="{{ $pr->id }}">{{ $pr->nama_produk }} (Stok: {{ $pr->stok }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
    </div>
    <div class="mb-3">
        <label>Jumlah Terjual</label>
        <input type="number" name="jumlah_terjual" class="form-control" required min="1">
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
