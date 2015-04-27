@extends('app')

@section('content')
    <img src="{{ $album->getLargeImageUrl() }}" /> <br />
    Name : {{ $album->name }} <br />
    Id : {{ $album->id }} <br />
    Release Date : {{ $album->release_date }} <br />
    Popularity : {{ $album->popularity }} <br /><br />

    @foreach ($album->tracks as $track)
        Track # {{ $track->track_number }} <br />
        name : {{ $track->name }} <br />
        <a href="{{ $track->preview_url }}">preview link</a> <br /><br />
    @endforeach
@endsection
