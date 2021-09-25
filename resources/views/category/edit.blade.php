@extends('layouts.app')

@section('content')
    <div class="header-create">
        <a class="back-button" href="{{ route('categories.index') }}">Volver atrás</a>
        <h2>Edición de categorías</h2>
    </div>
    <section class="container">
        <div class="container-border">
            <div>
                <div class="card container-small">
                    <form action="{{ route('categories.update', $category) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-field">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" value="{{ $category->name }}">
                            @error('name')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <button type="submit">Guardar</button>
                        </div>
                    </form>
                    <hr>
                    <div class="actions">
                        <p>Otras acciones:</p>
                        <a class="delete-button" href="{{ route('categories.destroy', $category) }}"
                            onclick="event.preventDefault(); document.getElementById('delete-form').submit();"
                        >Eliminar</a>
                        <form id="delete-form" action="{{ route('categories.destroy', $category) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
