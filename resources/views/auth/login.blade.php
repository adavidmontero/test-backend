@extends('layouts.app')

@section('content')
    <section class="container-login">
        @guest
            <div class="card">
                <p class="logo">all favorites</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="form-field">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email">
                        @error('email')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-field">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password">
                        @error('password')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-field">
                        <button type="submit">Login</button>
                    </div>
                </form>
                <p class="signup-legend">¿No tienes cuenta?
                    <a href="{{ route('signup') }}">Registrarme</a>
                </p>
            </div>
        @else
            <p>Ya estás logueado... <a href="/">Ir a home   </a></p>
        @endguest
    </section>
@endsection
