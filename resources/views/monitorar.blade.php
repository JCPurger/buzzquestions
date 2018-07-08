@extends('layouts.main')
@section('title', 'monitorar')

@section('content')
    <header class="container-fluid">
        <div id="graphics-session" class="row justify-content-md-center">
        @foreach($questions as $key => $question)
            <div class="col-md-6 card-char">
                <div class="col-md-12 card-border">
                    <h2>{{ $key + 1 }}º</h2>
                    <h4>Pergunta: {{ $question->wording }}</h4>
                    <canvas class="chart" data-tipo="bar" width="80" height="50"></canvas>
                </div>
            </div>
        @endforeach
        </div>
    </header>
@endsection

@section('scripts')
    <script>
        var questions = {!! $questions !!};
        console.log(questions);
        $(".chart").each(function (index) {
            new Chart($(this), {
                type: $(this).data('tipo'),
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: 'Opções escolhidas',
                        data: [20, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, .6)',
                            'rgba(54, 162, 235, .6)',
                            'rgba(255, 206, 86, .6)',
                            'rgba(75, 192, 192, .6)',
                            'rgba(153, 102, 255, .6)',
                            'rgba(255, 159, 64, .6)'
                        ],
                        borderColor: 'rgba(0,0,0, .8)',
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