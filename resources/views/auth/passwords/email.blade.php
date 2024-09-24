@extends('layouts.app')

@section('content')
    <a href="{{ route('login') }}" class="btn-back"><i class="fa-solid fa-chevron-left"></i>Regresar</a>
    <div class="form-container sign-in-container">
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <h1>Recuperar Contraseña</h1><br>
            <input type="email" id="email" placeholder="Email" @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit">Recuperar</button>
        </form>
    </div>
@endsection
