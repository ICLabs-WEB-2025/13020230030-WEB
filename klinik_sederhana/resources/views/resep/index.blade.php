@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Resep</h5>
                    <a href="{{ route('resep.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Resep
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
                                    <th>Obat</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reseps as $resep)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $resep->kunjungan->tanggal->format('d/m/Y') }}</td>
                                        <td>{{ $resep->kunjungan->pasien->nama }}</td>
                                        <td>{{ $resep->kunjungan->dokter->nama }}</td>
                                        <td>{{ $resep->obat->nama }}</td>
                                        <td>{{ $resep->jumlah }}</td>
                                        <td>{{ Str::limit($resep->keterangan, 50) ?: '-' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('resep.show', $resep) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('resep.edit', $resep) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('resep.destroy', $resep) }}" method="POST" class="d-inline">
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
                                        <td colspan="8" class="text-center">Tidak ada data resep</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        {{ $reseps->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 