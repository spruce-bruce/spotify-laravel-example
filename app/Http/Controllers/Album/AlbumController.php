<?php

namespace SpotifyExample\Http\Controllers\Album;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use SpotifyExample\Services\SpotifyService;

class AlbumController extends Controller
{
    /**
     * @var SpotifyService
     */
    private $spotifyService;

    /**
     * @param SpotifyService $spotifyService
     */
    public function __construct(SpotifyService $spotifyService) {
        $this->spotifyService = $spotifyService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request) {
        $query = $request->input('query');

        $data = [
            'query' => $query,
            'albums' => [],
            'next' => null,
            'previous' => null,
        ];

        if ($query) {
            $albums = $this->spotifyService->search($query);

            $data['albums'] = $albums['items'];
            $data['next'] = $albums['next'];
            $data['prev'] = $albums['previous'];
        }

        return view('album/search', $data);
    }
}
