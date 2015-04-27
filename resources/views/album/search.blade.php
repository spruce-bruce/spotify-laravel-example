@extends('app')

@section('content')

    <form method="POST" action="">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="text" name="query" id="query" value="{{ $query }}" />
        <button>Search</button>
    </form>


    @foreach ($albums as $album)
        <div class="album">

            <a href="/album/{{ $album->id }}">
                <img src="{{ $album->getMediumImageUrl() }}" />
            </a> <br />
            Name : <a href="/album/{{ $album->id }}">{{ $album->name }}</a> <br />
        </div>
        <br />
    @endforeach

@endsection
