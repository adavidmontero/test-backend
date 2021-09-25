@extends('layouts.app')

@section('content')
    <section class="favorites-container">
        @if ($favorites->count() > 0)
            <div class="favorites">
                @foreach ($favorites as $favorite)
                    <div class="favorite">
                        <h2>
                            <a href="{{ route('favorites.show', $favorite) }}">{{ $favorite->title }}</a>
                        </h2>
                        <p>{{ $favorite->url }}</p>
                    </div>
                @endforeach
            </div>
            <div class="pagination">
                {{ $favorites->links() }}
            </div>
        @else
            <p class="info-empty">Aún no hay favoritos publicados, deberías publicar alguno</p>
        @endif
    </section>
@endsection
