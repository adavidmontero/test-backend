@extends('layouts.app')

@section('content')
    <div class="header-index">
        <h2>Mis categorías</h2>
        <a class="new-button" href="{{ route('categories.create') }}">Nueva Categoría</a>
    </div>
    <section class="container">
        <div class="container-border">
            <div>
                <table>
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a class="edit-button" href="{{ route('categories.edit', $category) }}">Editar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="info-empty">Aún no tienes categorías registradas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination">
            {{ $categories->links() }}
        </div>
    </section>
@endsection
