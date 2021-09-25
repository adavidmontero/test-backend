@extends('layouts.app')

@section('content')
    <div class="header-create">
        <a class="back-button" href="/">Home</a>
        @auth
            <a class="back-button" href="{{ route('favorites.index') }}">Mis favoritos</a>
        @endauth
        <h2>Vista detallada del favorito</h2>
    </div>
    <section class="container">
        <div class="container-border">
            <div>
                <div class="card container-small">
                    <h3>Título</h3>
                    <p>{{ $favorite->title }}</p>
                    <hr>
                    <h3>URL</h3>
                    <p>{{ $favorite->url }}</p>
                    <hr>
                    <h3>Descripción</h3>
                    <p>{{ $favorite->description }}</p>
                    <hr>
                    <h3>Categorías</h3>
                    <p>{{ $favorite->categories->pluck('name')->implode(', ') }}</p>
                    <hr>
                    <h3>Autor</h3>
                    <p>{{ $favorite->user->name }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
