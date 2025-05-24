@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Obat</h5>
                    <div>
                        <a href="{{ route('obat.edit', $obat) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        <a href="{{ route('obat.index') }}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Nama Obat</div>
                        <div class="col-md-8">{{ $obat->nama }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Stok</div>
                        <div class="col-md-8">{{ $obat->stok }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Harga</div>
                        <div class="col-md-8">Rp {{ number_format($obat->harga, 0, ',', '.') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Keterangan</div>
                        <div class="col-md-8">{{ $obat->keterangan ?: '-' }}</div>
                    </div>

                    <hr>

                    <h6 class="mb-3">Riwayat Penggunaan</h6>
                    @if($obat->reseps->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pasien</th>
                                        <th>Dokter</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($obat->reseps as $resep)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $resep->kunjungan->tanggal->format('d/m/Y') }}</td>
                                            <td>{{ $resep->kunjungan->pasien->nama }}</td>
                                            <td>{{ $resep->kunjungan->dokter->nama }}</td>
                                            <td>{{ $resep->jumlah }}</td>
                                            <td>
                                                <a href="{{ route('kunjungan.show', $resep->kunjungan) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye me-1"></i>Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info mb-0">
                            Belum ada riwayat penggunaan obat ini.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 