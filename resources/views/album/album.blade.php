@extends('app')

@section('content')
    <img src="{{ $album->getLargeImageUrl() }}" /> <br />
    Name : {{ $album->name }} <br />
    Id : {{ $album->id }} <br />
    Release Date : {{ $album->release_date }} <br />
    Popularity : {{ $album->popularity }}
@endsection
