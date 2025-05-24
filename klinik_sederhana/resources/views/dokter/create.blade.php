@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Dokter</h1>
    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="spesialis">Spesialis</label>
            <input type="text" class="form-control" id="spesialis" name="spesialis" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection 