@extends('layouts.admin')

@section('content')




            <!-- Add a date range picker input -->
            <div class="container-fluid">

                <div class="row">

                    <h1>Laravel ChartJS Chart Example - ItSolutionStuff.com</h1>

                    <form method="get" action="{{ route('chart') }}">
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" value="{{ $start_date }}" />
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" value="{{ $end_date }}" />
                        <button type="submit">Filter</button>
                    </form>

                    <canvas id="myChart" height="100px"></canvas>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <script type="text/javascript">

                        var labels =  {{ Js::from($labels) }};
                        var users =  {{ Js::from($data) }};

                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'PO created',
                                backgroundColor: 'rgb(255, 99, 132)',
                                borderColor: 'rgb(255, 99, 132)',
                                data: users,
                            }]
                        };

                        const config = {
                            type: 'bar',
                            data: data,
                            options: {}
                        };

                        const myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                        );

                    </script>
                </div>
            </div>

        </div>
    </div>


@endsection
