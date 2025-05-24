@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Statistik Pasien & Kunjungan</div>
                <div class="card-body">
                    <canvas id="statistikChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('statistikChart').getContext('2d');
    var statistikChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! json_encode($data) !!},
                backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)']
            }]
        }
    });
</script>
@endsection 