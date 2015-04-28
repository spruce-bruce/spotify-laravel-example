@extends('app')

@section('content')

    <form method="POST" action="">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="text" name="query" id="query" value="{{ $query }}" />
        <button>Search</button>
    </form>

    @foreach ($albums as $album)
        <div class="album-search-result">
            <a class="img-wrapper" href="/album/{{ $album->id }}">
                <img src="{{ $album->getMediumImageUrl() }}" />
            </a>

            <div class="album-info">
                Name : <a href="/album/{{ $album->id }}">{{ $album->name }}</a>
            </div>

            <div class="clear"></div>
        </div>
    @endforeach

@endsection
