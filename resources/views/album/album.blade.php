@extends('app')

@section('content')
    <div id="album">
        <img src="{{ $album->getLargeImageUrl() }}" />

        <div class="album-info">
            <h4>{{ $album->name }}</h4>
            {{ $album->release_date }}

            <table>
                <tr>
                    <th>#</th> <th>name</th>
                </tr>

                @foreach ($album->tracks as $track)
                    <tr>
                        <td>{{ $track->track_number }}</td>
                        <td><a href="{{ $track->preview_url }}">{{ $track->name }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
