@extends('app')

@section('content')

    <form method="POST" action="">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="text" name="query" id="query" value="{{ $query }}" />
        <button>Search</button>
    </form>

@endsection
