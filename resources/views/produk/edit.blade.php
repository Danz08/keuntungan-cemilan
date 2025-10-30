@extends('layouts.main')

@section('content')
<h4>Edit Produk</h4>
<form action="{{ route('produk.update', $produk->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control" value="{{ $produk->kategori }}">
    </div>
    <div class="mb-3">
        <label>Harga Modal</label>
        <input type="number" step="0.01" name="harga_modal" class="form-control" value="{{ $produk->harga_modal }}" required>
    </div>
    <div class="mb-3">
        <label>Harga Jual</label>
        <input type="number" step="0.01" name="harga_jual" class="form-control" value="{{ $produk->harga_jual }}" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $produk->stok }}">
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
