@extends('layouts.app')

@section('content')
    <div class="header-create">
        <a class="back-button" href="{{ route('favorites.index') }}">Volver atrás</a>
        <h2>Edición de favoritos</h2>
    </div>
    <section class="container">
        <div class="container-border">
            <div>
                <div class="card container-small">
                    <form action="{{ route('favorites.update', $favorite) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-field">
                            <label for="title">Título:</label>
                            <input type="title" name="title" id="title" value="{{ $favorite->title }}">
                            @error('title')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="url">Url:</label>
                            <input type="url" name="url" id="url" value="{{ $favorite->url }}">
                            @error('url')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="description">Descripción:</label>
                            <textarea name="description" id="description">{{ $favorite->description }}</textarea>
                            @error('description')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="visibility">Visibilidad:</label>
                            <div class="container-radio">
                                <div class="form-radio">
                                    <input type="radio" name="visibility" id="true" value="1"
                                        @if ($favorite->visibility == 'Público') checked @endif>
                                    <label for="true">Público</label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" name="visibility" id="false" value="0"
                                        @if ($favorite->visibility == 'Privado') checked @endif>
                                    <label for="false">Privado</label>
                                </div>
                            </div>
                            @error('visibility')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="categories">Categorías:</label>
                            <select name="categories[]" id="categories" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($favorite->categories->contains($category->id)) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categories')
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
                        <a class="delete-button" href="{{ route('favorites.destroy', $favorite) }}"
                            onclick="event.preventDefault(); document.getElementById('delete-form').submit();"
                        >Eliminar</a>
                        <form id="delete-form" action="{{ route('favorites.destroy', $favorite) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
