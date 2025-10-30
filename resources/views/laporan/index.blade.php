@extends('layouts.main')

@section('content')
<h3>Dashboard / Laporan</h3>

<form class="row g-2 mb-3">
    <div class="col-auto">
        <input type="date" name="start" class="form-control" value="{{ $start ?? '' }}">
    </div>
    <div class="col-auto">
        <input type="date" name="end" class="form-control" value="{{ $end ?? '' }}">
    </div>
    <div class="col-auto">
        <button class="btn btn-primary">Filter</button>
    </div>
</form>

<div class="row">
    <div class="col-md-3">
        <div class="card p-3">Modal Dikeluarkan:<br>Rp {{ number_format($total_modal ?? 0,0,',','.') }}</div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">Pendapatan:<br>Rp {{ number_format($total_pendapatan ?? 0,0,',','.') }}</div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">Keuntungan:<br>Rp {{ number_format($total_keuntungan ?? 0,0,',','.') }}</div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">Surplus:<br>Rp {{ number_format($surplus ?? 0,0,',','.') }}</div>
    </div>
</div>

<hr>

<h5 class="mt-3">Penjualan per Produk</h5>
<table class="table table-bordered mt-2">
    <thead>
        <tr><th>Produk</th><th>Jumlah Terjual</th><th>Pendapatan</th></tr>
    </thead>
    <tbody>
        @forelse($penjualan_per_produk as $row)
            <tr>
                <td>{{ $row->nama_produk }}</td>
                <td>{{ $row->jumlah }}</td>
                <td>Rp {{ number_format($row->pendapatan,0,',','.') }}</td>
            </tr>
        @empty
            <tr><td colspan="3" class="text-center">Belum ada data</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
