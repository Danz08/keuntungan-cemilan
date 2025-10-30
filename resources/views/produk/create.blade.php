@extends('layouts.main')

@section('content')
<h4>Tambah Produk</h4>
<form action="{{ route('produk.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control">
    </div>
    <div class="mb-3">
        <label>Harga Modal</label>
        <input type="number" step="0.01" name="harga_modal" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Harga Jual</label>
        <input type="number" step="0.01" name="harga_jual" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="0">
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
