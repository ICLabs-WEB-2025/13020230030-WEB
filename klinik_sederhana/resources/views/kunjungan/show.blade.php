@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Kunjungan</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pasien: {{ $kunjungan->pasien->nama }}</h5>
            <p class="card-text">Dokter: {{ $kunjungan->dokter->nama }}</p>
            <p class="card-text">Tanggal: {{ $kunjungan->tanggal }}</p>
        </div>
    </div>
    <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection 