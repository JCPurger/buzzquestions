@extends('layouts.main')
@section('title', 'enviar')

@section('content')

<header class="container-fluid">
  <div class="card">

    @if (session('message'))
    <div class="alert alert-danger">
      {{ session('message') }}
    </div>
    @endif

    <form action="{{ route('submit.store',$id) }}" method="post">
      @csrf
      @method('PUT')
      <h3 class="enviar">Compartilhe seu questionário!</h3>

      <div class="col-sm-10">
        <div class="row send">
          <div class="form-group">
            <label>Enviar para:</label>
            <div class="row">
              <div class="col-md-12 offset-md-10">
                <input type="email" class="form-control form-enviar" name="email" id="email" placeholder="email@exemplo.com">
              </div>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <div class="col-sm-10">
        <div class="row send">
          <div class="form-group">
            <label>Assunto:</label>
            <div class="row">
              <div class="col-md-12 offset-md-10">
                <input type="text" class="form-control form-enviar" name="subject" id="subject" placeholder="Queremos ouvir sua opinião">
              </div>
            </div>
          </div>
        </div>
      </div>


      <hr>

    <div class="col-sm-10">
        <div class="row send">
          <div class="form-group">
            <label>Mensagem:</label>
            <div class="row">
              <div class="col-md-8 offset-md-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" cols="90" placeholder="Sua mensagem"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button type="submit" class="button button-block"/>Enviar</button>

  </form>
</div>
</header>

@endsection