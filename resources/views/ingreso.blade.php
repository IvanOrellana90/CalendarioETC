@extends('layouts.login')

@section('content')
    @include('includes.modalCrearUsuario')
    <form class="form-signin" action="{{ route('signin') }}" method="post" >
        <h2 class="form-signin-heading">Ingresa al Sitio</h2>
        <label for="inputEmail" class="sr-only">Dirección Email</label>
        <input id="inputEmail" name="email" class="form-control" placeholder="Dirección Email" required autofocus type="email" value="{{ Request::old('email') }}">
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required type="password" value="{{ Request::old('password') }}">
        <div class="checkbox">
            <label>
                <input value="remember-me" type="checkbox"> Recordar
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="ingresar" type="submit">Ingresar</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <a href="#" data-toggle="modal" data-target="#crearUsaurio">Registrarme</a>
    </form>
@endsection