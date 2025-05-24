@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Data Kunjungan</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('kunjungan.update', $kunjungan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="pasien_id" class="form-label">Pasien</label>
                            <select class="form-select @error('pasien_id') is-invalid @enderror" id="pasien_id" name="pasien_id" required>
                                <option value="">Pilih Pasien</option>
                                @foreach($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}" {{ old('pasien_id', $kunjungan->pasien_id) == $pasien->id ? 'selected' : '' }}>
                                        {{ $pasien->nama }} - {{ $pasien->no_telp }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pasien_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dokter_id" class="form-label">Dokter</label>
                            <select class="form-select @error('dokter_id') is-invalid @enderror" id="dokter_id" name="dokter_id" required>
                                <option value="">Pilih Dokter</option>
                                @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->id }}" {{ old('dokter_id', $kunjungan->dokter_id) == $dokter->id ? 'selected' : '' }}>
                                        {{ $dokter->nama }} - {{ $dokter->spesialis }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dokter_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Kunjungan</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $kunjungan->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="diagnosa" class="form-label">Diagnosa</label>
                            <textarea class="form-control @error('diagnosa') is-invalid @enderror" id="diagnosa" name="diagnosa" rows="3">{{ old('diagnosa', $kunjungan->diagnosa) }}</textarea>
                            @error('diagnosa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tindakan" class="form-label">Tindakan</label>
                            <textarea class="form-control @error('tindakan') is-invalid @enderror" id="tindakan" name="tindakan" rows="3">{{ old('tindakan', $kunjungan->tindakan) }}</textarea>
                            @error('tindakan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
 