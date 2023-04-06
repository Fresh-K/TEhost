@extends('layouts.admin')

@section('content')


    <div class="container-fluid">

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Validation Chart</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('chart5') }}" method="GET">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $start_date }}">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $end_date }}">
                            </div>
                            <div class="form-group">
                                <label for="inspector">Line Inspector</label>
                                <select name="inspector" class="form-control default-select " id="inspector">
                                    <option value="">Select an inspector</option>
                                    @foreach ($inspector as $insp)
                                        <option value="{{ $insp->id }}" {{ $selected_inspector && $selected_inspector->id == $insp->id ? 'selected' : '' }}>{{ $insp->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block">Filtre</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <div class="card border-0">
                            <div class="card-body">
                                <canvas id="chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4"></div>
            </div>
        </div>
    </div>
</div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var data = {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Validation',
                data: {!! json_encode($data) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        };

        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>



@endsection





