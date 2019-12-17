@extends('layouts.app')

@section('content')
<div class="container center glavni">
    <img src="img/logo-png.png" alt="Logo">
    <div class="clearfix"> </div>

    <div class="forma-login">
        <div class="odabir">
            <span class="aktivno">Prijavite se</span>
            <span><a href="register">Kreirajte nalog</a></span>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <input id="email" type="email" placeholder="Unesite Vaš e-mail" name="email" value="{{ old('email') }}" required autofocus>
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
            
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="display: inline-block;width: auto;"><span class="small"> Remember Me</span>

            <div class="clearfix"> </div>

            <button type="submit" class="btn btn-primary dugme mt__15" type="submit"><i class="fas fa-user-circle"></i> Prijavite se</button>

            <div class="clearfix"> </div>

            <button type="button" class="btn btn-primary dugme mt__10 linked"><i class="fab fa-linkedin-in"></i> LinkedIn prijava</button>

        </form>

    </div>

</div>
@endsection
