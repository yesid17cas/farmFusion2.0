@extends('layouts.app')

@section('content')
    @livewire('recuperar')
    @livewire('recuperar', ['token' => $token, 'email' => $email])
@endsection
