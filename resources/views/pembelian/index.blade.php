@extends('layouts.main')

@section('content')
<h4>Pembelian Bahan</h4>

<a href="{{ route('pembelian.create') }}" class="btn btn-primary mb-3">Tambah Pembelian</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Bahan</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pembelian as $bahan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $bahan->nama_bahan }}</td>
            <td>{{ $bahan->jumlah }}</td>
            <td>Rp {{ number_format($bahan->harga_satuan, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($bahan->total, 0, ',', '.') }}</td>
            <td>{{ $bahan->tanggal_pembelian }}</td>
            <td>
                <form action="{{ route('pembelian.destroy', $bahan->id) }}" method="POST" style="display:inline-block">

                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">Belum ada data pembelian bahan</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
