@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Kunjungan</h5>
                    <a href="{{ route('kunjungan.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Kunjungan
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pasien</th>
                                    <th>Dokter</th>
                                    <th>Diagnosa</th>
                                    <th>Tindakan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kunjungans as $kunjungan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kunjungan->tanggal->format('d/m/Y') }}</td>
                                        <td>{{ $kunjungan->pasien->nama }}</td>
                                        <td>{{ $kunjungan->dokter->nama }}</td>
                                        <td>{{ Str::limit($kunjungan->diagnosa, 50) ?: '-' }}</td>
                                        <td>{{ Str::limit($kunjungan->tindakan, 50) ?: '-' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('kunjungan.show', $kunjungan) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('kunjungan.edit', $kunjungan) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('kunjungan.destroy', $kunjungan) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data kunjungan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        {{ $kunjungans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 