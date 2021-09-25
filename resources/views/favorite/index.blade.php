@extends('layouts.app')

@section('content')
    <div class="header-index">
        <h2>Mis favoritos</h2>
        <a class="new-button" href="{{ route('favorites.create') }}">Nuevo favorito</a>
    </div>
    <section class="container">
        <div class="container-border">
            <div>
                <table>
                    <thead>
                        <tr>
                            <td>Título</td>
                            <td>Url</td>
                            <td>Visibilidad</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($favorites as $favorite)
                            <tr>
                                <td>{{ $favorite->title }}</td>
                                <td>{{ $favorite->url }}</td>
                                <td>{{ $favorite->visibility }}</td>
                                <td>
                                    <a class="show-button" href="{{ route('favorites.show', $favorite) }}">Ver</a>
                                    <a class="edit-button" href="{{ route('favorites.edit', $favorite) }}">Editar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="info-empty">Aún no tienes favoritos registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination">
            {{ $favorites->links() }}
        </div>
    </section>
@endsection
