@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Tambah Resep Baru</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('resep.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="kunjungan_id" class="form-label">Kunjungan</label>
                            <select class="form-select @error('kunjungan_id') is-invalid @enderror" id="kunjungan_id" name="kunjungan_id" required>
                                <option value="">Pilih Kunjungan</option>
                                @foreach($kunjungans as $kunjungan)
                                    <option value="{{ $kunjungan->id }}" {{ old('kunjungan_id', request('kunjungan_id')) == $kunjungan->id ? 'selected' : '' }}>
                                        {{ $kunjungan->tanggal->format('d/m/Y') }} - {{ $kunjungan->pasien->nama }} ({{ $kunjungan->dokter->nama }})
                                    </option>
                                @endforeach
                            </select>
                            @error('kunjungan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="obat_id" class="form-label">Obat</label>
                            <select class="form-select @error('obat_id') is-invalid @enderror" id="obat_id" name="obat_id" required>
                                <option value="">Pilih Obat</option>
                                @foreach($obats as $obat)
                                    <option value="{{ $obat->id }}" {{ old('obat_id') == $obat->id ? 'selected' : '' }}>
                                        {{ $obat->nama }} (Stok: {{ $obat->stok }})
                                    </option>
                                @endforeach
                            </select>
                            @error('obat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" min="1" required>
                            @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('resep.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i>Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 