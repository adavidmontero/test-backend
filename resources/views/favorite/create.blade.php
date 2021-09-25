@extends('layouts.app')

@section('content')
    <div class="header-create">
        <a class="back-button" href="{{ route('favorites.index') }}">Volver atrás</a>
        <h2>Registro de favoritos</h2>
    </div>
    <section class="container">
        <div class="container-border">
            <div>
                <div class="card container-small">
                    <form action="{{ route('favorites.store') }}" method="post">
                        @csrf

                        <div class="form-field">
                            <label for="title">Título:</label>
                            <input type="title" name="title" id="title">
                            @error('title')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="url">Url:</label>
                            <input type="url" name="url" id="url">
                            @error('url')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="description">Descripción:</label>
                            <textarea name="description" id="description"></textarea>
                            @error('description')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="visibility">Visibilidad:</label>
                            <div class="container-radio">
                                <div class="form-radio">
                                    <input type="radio" name="visibility" id="true" value="1">
                                    <label for="true">Público</label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" name="visibility" id="false" value="0">
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
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                </div>
            </div>
        </div>
    </section>
@endsection
