@extends('layouts.main')
@section('title', 'monitorar')

@section('content')
    <header class="container-fluid">
        @if(isset($btnGerar))
        <a href="{{ route('report',$questionnaire->id) }}" class="btn btn-warning">Gerar pdf</a>
        @endif
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
        var questions = {!! $questionsJson !!};
        $(".chart").each(function (index) {
            new Chart($(this), {
                type: 'bar',
                data: {
                    labels: questions[index].labels,
                    datasets: [{
                        label: 'Opções escolhidas',
                        data: questions[index].data,
                        backgroundColor: getRandomColor(questions[index].data.length),
                        borderColor: 'rgba(0,0,0, .7)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    animation: {
                        duration: 0
                    }
                }
            });
        });

        function getRandomColor(length) {
            var colors = [];
            for (var i = 0; i < length; i++) {
                colors.push("#"+((1<<24)*Math.random()|0).toString(16));
            }
            return colors;
        }
    </script>
@endsection