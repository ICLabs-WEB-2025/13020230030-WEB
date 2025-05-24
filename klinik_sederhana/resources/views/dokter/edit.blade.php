@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Dokter</h1>
    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $dokter->nama }}" required>
        </div>
        <div class="form-group">
            <label for="spesialis">Spesialis</label>
            <input type="text" class="form-control" id="spesialis" name="spesialis" value="{{ $dokter->spesialis }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection 