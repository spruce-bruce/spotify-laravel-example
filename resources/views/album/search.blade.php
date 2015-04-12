@extends('app')

@section('content')

    <form method="POST" action="">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="text" name="query" id="query" value="{{ $query }}" />
        <button>Search</button>
    </form>


    @foreach ($albums as $album)
        <div class="album">
            <img src="{{ $album['images'][1]['url'] }}" />
            Name : {{ $album['name'] }}
        </div>
    @endforeach

@endsection
