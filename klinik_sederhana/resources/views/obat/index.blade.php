@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Obat</h5>
                    <a href="{{ route('obat.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Obat
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
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($obats as $obat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $obat->nama }}</td>
                                        <td>{{ $obat->stok }}</td>
                                        <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                        <td>{{ $obat->keterangan ?? '-' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('obat.show', $obat) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('obat.edit', $obat) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('obat.destroy', $obat) }}" method="POST" class="d-inline">
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
                                        <td colspan="6" class="text-center">Tidak ada data obat</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        {{ $obats->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 