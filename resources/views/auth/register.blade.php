@extends('layouts.account')
@section('title', 'register')

@section('form')
<div class="form">

    <ul class="tab-group">
        <li class="tab active"><a href="#signup">Inscrever-se</a></li>
        <li class="tab"><a href="#login">Entrar</a></li>
    </ul>

    <div class="tab-content">
        <div id="signup">
            <h1>Registre-se gratuitamente!</h1>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="top-row">
                    <div class="field-wrap">
                        <label class="tema">
                            Nome<span class="req">*</span>
                        </label>
                        <input id="name" type="text" class="tema {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                               value="{{ old('name') }}" required autocomplete="off"/>
                    </div>

                    <div class="field-wrap">
                        <label class="tema">
                            Sobrenome<span class="req">*</span>
                        </label>
                        <input type="text" class="tema {{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname"
                               value="{{ old('lastname') }}" required autocomplete="off"/>
                    </div>
                </div>

                <div class="field-wrap">
                    <label class="tema">
                        Email<span class="req">*</span>
                    </label>
                    <input id="email" type="email" class="tema {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label class="tema">
                        Senha<span class="req">*</span>
                    </label>
                    <input id="password" type="password" class="tema {{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label class="tema">
                        Comfirmar Senha<span class="req">*</span>
                    </label>
                    <input id="password_confirmation" type="password"
                           class="tema {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                           name="password_confirmation" required autocomplete="off"/>
                </div>

                <button type="submit" class="button button-block"/>
                Começar</button>

            </form>

        </div>

        <div id="login">
            <h1>Bem vindo!</h1>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="field-wrap">
                    <label class="tema">
                        Email<span class="req">*</span>
                    </label>
                    <input id="email" type="email" class="tema {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label class="tema">
                        Senha<span class="req">*</span>
                    </label>
                    <input id="password" type="password" class="tema {{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password" required autocomplete="off"/>
                </div>

                <p class="forgot"><a href="#">Esqueceu a senha?</a></p>

                <button class="button button-block"/>
                Entrar</button>

            </form>

        </div>

    </div><!-- tab-content -->

</div> <!-- /form -->
@endsection