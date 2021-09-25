@extends('layouts.app')

@section('content')
    <section class="container-signup">
        <div class="card">
            <p class="logo">all favorites</p>
            <form action="{{ route('signup') }}" method="post">
                @csrf

                <div class="form-field">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name">
                    @error('name')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

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
                    <label for="password-confirm">Confirmar contraseña:</label>
                    <input type="password" name="password_confirmation" id="password-confirm">
                </div>

                <div class="form-field">
                    <button type="submit">Signup</button>
                </div>
            </form>
            <p class="signup-legend">¿Ya tienes cuenta?
                <a href="{{ route('login') }}">Ingresar</a>
            </p>
        </div>
    </section>
@endsection
