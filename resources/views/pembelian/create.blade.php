@extends('layouts.main')

@section('content')
<h4>Tambah Pembelian Bahan</h4>

<form action="{{ route('pembelian.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Bahan</label>
        <input type="text" name="nama_bahan" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required min="0" step="any">
    </div>
    <div class="mb-3">
        <label>Harga Satuan</label>
        <input type="number" name="harga_satuan" class="form-control" required min="1">
    </div>
    <div class="mb-3">
        <label>Tanggal Pembelian</label>
        <input type="date" name="tanggal_pembelian" class="form-control" value="{{ date('Y-m-d') }}" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
