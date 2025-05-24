@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Resep</h5>
                    <div>
                        <a href="{{ route('resep.edit', $resep) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        <a href="{{ route('resep.index') }}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Tanggal Kunjungan</div>
                        <div class="col-md-8">{{ $resep->kunjungan->tanggal->format('d/m/Y') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Pasien</div>
                        <div class="col-md-8">
                            <a href="{{ route('pasien.show', $resep->kunjungan->pasien) }}" class="text-decoration-none">
                                {{ $resep->kunjungan->pasien->nama }}
                            </a>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Dokter</div>
                        <div class="col-md-8">
                            <a href="{{ route('dokter.show', $resep->kunjungan->dokter) }}" class="text-decoration-none">
                                {{ $resep->kunjungan->dokter->nama }} ({{ $resep->kunjungan->dokter->spesialis }})
                            </a>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Obat</div>
                        <div class="col-md-8">
                            <a href="{{ route('obat.show', $resep->obat) }}" class="text-decoration-none">
                                {{ $resep->obat->nama }}
                            </a>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Jumlah</div>
                        <div class="col-md-8">{{ $resep->jumlah }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Keterangan</div>
                        <div class="col-md-8">{{ $resep->keterangan ?: '-' }}</div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Diagnosa</div>
                        <div class="col-md-8">{{ $resep->kunjungan->diagnosa ?: '-' }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Tindakan</div>
                        <div class="col-md-8">{{ $resep->kunjungan->tindakan ?: '-' }}</div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('kunjungan.show', $resep->kunjungan) }}" class="btn btn-info">
                            <i class="bi bi-eye me-1"></i>Lihat Detail Kunjungan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 