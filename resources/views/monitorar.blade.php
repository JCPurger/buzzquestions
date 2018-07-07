@extends('layouts.main')
@section('title', 'monitorar')

@section('content')
    <header class="container-fluid">
        <div class="row centered">
            <div class="col-md-6">
                <div class="col-md-12 card-border">
                    <h2>Questão 1</h2>
                    <canvas class="chart" data-tipo="bar" width="80" height="50"></canvas>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-12 card-border">
                    <h2>Questão 2</h2>
                    <canvas class="chart" data-tipo="line" width="80" height="50"></canvas>
                </div>
            </div>
        </div>

        <div class="row centered">
            <div class="col-md-6">
                <div class="col-md-12 card-border">
                    <h2>Questão 3</h2>
                    <canvas class="chart" data-tipo="pie" width="80" height="50"></canvas>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-12 card-border">
                    <h2>Questão 4</h2>
                    <canvas class="chart" data-tipo="radar" width="80" height="50"></canvas>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('scripts')
    <script>
        $(".chart").each(function (index) {
            new Chart($(this), {
                type: $(this).data('tipo'),
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection