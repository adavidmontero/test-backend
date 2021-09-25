@extends('layouts.app')

@section('content')
    <div class="header-create">
        <a class="back-button" href="{{ route('categories.index') }}">Volver atrás</a>
        <h2>Registro de categorías</h2>
    </div>
    <section class="container">
        <div class="container-border">
            <div>
                <div class="card container-small">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf

                        <div class="form-field">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name">
                            @error('name')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <button type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
