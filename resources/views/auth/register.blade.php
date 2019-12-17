@extends('layouts.app')

@section('content')
<div class="container center mt__70">
    <img src="img/logo-png.png" alt="Logo">
    <div class="clearfix"> </div>

    <div class="forma-login">
        <div class="odabir">
            <span><a href="login">Prijavite se</a></span>
            <span class="aktivno">Kreirajte nalog</span>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <input id="name" type="text" placeholder="Unesite Vaš e-mail" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <br>
            
            <input id="email" type="email" placeholder="Unesite Vaš e-mail" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <br>
            
            <input id="password" type="password" placeholder="Unesite Vašu lozinku" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <br>  

            <input id="password-confirm" type="password" placeholder="Unesite Vašu lozinku" name="password_confirmation" required>
            
            <div class="clearfix"> </div>

            <button type="submit" class="btn btn-primary dugme mt__15" type="submit"><i class="fas fa-user-circle"></i> Prijavite se</button>

            <div class="clearfix"> </div>

            <button type="button" class="btn btn-primary dugme mt__10 linked"><i class="fab fa-linkedin-in"></i> LinkedIn prijava</button>

        </form>  
        
    </div>

</div>
@endsection
