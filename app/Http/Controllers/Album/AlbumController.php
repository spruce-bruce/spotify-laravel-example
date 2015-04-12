<?php

namespace SpotifyExample\Http\Controllers\Album;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function search(Request $request) {
        return view('album/search', ['query' => $request->input('query')]);
    }
}
