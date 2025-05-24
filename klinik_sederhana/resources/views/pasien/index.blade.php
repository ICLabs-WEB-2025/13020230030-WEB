@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Pasien</h5>
                    <a href="{{ route('pasien.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Pasien
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
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No. Telp</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasiens as $pasien)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pasien->nama }}</td>
                                        <td>{{ $pasien->alamat }}</td>
                                        <td>{{ $pasien->no_telp ?? '-' }}</td>
                                        <td>{{ $pasien->tanggal_lahir ? $pasien->tanggal_lahir->format('d/m/Y') : '-' }}</td>
                                        <td>{{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : ($pasien->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('pasien.show', $pasien) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('pasien.edit', $pasien) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('pasien.destroy', $pasien) }}" method="POST" class="d-inline">
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
                                        <td colspan="7" class="text-center">Tidak ada data pasien</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        {{ $pasiens->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 