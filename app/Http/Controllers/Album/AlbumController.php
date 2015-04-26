<?php

namespace SpotifyExample\Http\Controllers\Album;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use SpotifyExample\Services\SpotifyService;
use SpotifyExample\Services\AlbumService;

class AlbumController extends Controller
{
    /**
     * @var SpotifyService
     */
    private $spotifyService;

    /**
     * @var AlbumService
     */
    private $albumService;

    /**
     * @param SpotifyService $spotifyService
     * @param AlbumService $albumService
     */
    public function __construct(
        SpotifyService $spotifyService,
        AlbumService $albumService
    ) {
        $this->spotifyService = $spotifyService;
        $this->albumService = $albumService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request) {
        $query = $request->input('query');

        if ($query) {
            $spotifyAlbumResponse = $this->spotifyService->search($query);
            $albums = $this->albumService->getAlbumsFromResponse($spotifyAlbumResponse);
        }


        $data = [
            'query' => $query,
            'albums' => [],
            'next' => null,
            'previous' => null,
        ];

        return view('album/search', $data);
    }
}
