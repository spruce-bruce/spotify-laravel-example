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
        $albums = [];

        if ($query) {
            $albums = $this->albumService->search($query);
        }

        $data = [
            'query' => $query,
            'albums' => $albums
        ];

        return view('album/search', $data);
    }

    /**
     * Display the heck out of an album including its tracks
     *
     * @param $id
     * @param Request $request
     */
    public function getAlbum($id, Request $request) {
        var_dump($id);
        die();
    }
}
