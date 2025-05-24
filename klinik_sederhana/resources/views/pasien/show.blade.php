@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Pasien</h5>
                    <div>
                        <a href="{{ route('pasien.edit', $pasien) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Nama</div>
                        <div class="col-md-8">{{ $pasien->nama }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Alamat</div>
                        <div class="col-md-8">{{ $pasien->alamat }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">No. Telepon</div>
                        <div class="col-md-8">{{ $pasien->no_telp ?? '-' }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Tanggal Lahir</div>
                        <div class="col-md-8">{{ $pasien->tanggal_lahir ? $pasien->tanggal_lahir->format('d/m/Y') : '-' }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Jenis Kelamin</div>
                        <div class="col-md-8">
                            @if($pasien->jenis_kelamin == 'L')
                                Laki-laki
                            @elseif($pasien->jenis_kelamin == 'P')
                                Perempuan
                            @else
                                -
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Riwayat Kunjungan</div>
                        <div class="col-md-8">
                            @if($pasien->kunjungans->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Dokter</th>
                                                <th>Diagnosa</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pasien->kunjungans as $kunjungan)
                                                <tr>
                                                    <td>{{ $kunjungan->tanggal->format('d/m/Y') }}</td>
                                                    <td>{{ $kunjungan->dokter->nama }}</td>
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
                                <p class="text-muted mb-0">Belum ada riwayat kunjungan</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('pasien.qrcode', $pasien->id) }}" class="btn btn-info" target="_blank">
                        <i class="fas fa-qrcode"></i> Tampilkan QR Code
                    </a>
                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 