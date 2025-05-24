@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Dokter</h5>
                    <div>
                        <a href="{{ route('dokter.edit', $dokter) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Nama</div>
                        <div class="col-md-8">{{ $dokter->nama }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Spesialis</div>
                        <div class="col-md-8">{{ $dokter->spesialis }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">No. Telepon</div>
                        <div class="col-md-8">{{ $dokter->no_telp ?? '-' }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Alamat</div>
                        <div class="col-md-8">{{ $dokter->alamat ?? '-' }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Jadwal Kunjungan</div>
                        <div class="col-md-8">
                            @if($dokter->kunjungans->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Pasien</th>
                                                <th>Diagnosa</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dokter->kunjungans as $kunjungan)
                                                <tr>
                                                    <td>{{ $kunjungan->tanggal->format('d/m/Y') }}</td>
                                                    <td>{{ $kunjungan->pasien->nama }}</td>
                                                    <td>{{ $kunjungan->diagnosa ?? '-' }}</td>
                                                    <td>
                                                        <a href="{{ route('kunjungan.show', $kunjungan) }}" class="btn btn-info btn-sm">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-muted mb-0">Belum ada jadwal kunjungan</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 