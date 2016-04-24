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

    private function getSearchData(Request $request) {
        $query = $request->input('query');
        $albums = [];

        if ($query) {
            $albums = $this->albumService->search($query);
        }

        $data = [
            'query' => $query,
            'albums' => $albums
        ];

        return $data;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request) {
        return view('album/search', $this->getSearchData($request));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function restSearch(Request $request) {
        $response = $this->getSearchData($request);
        foreach($response['albums'] as $album) {
            $album->load('images');
        }

        return $response;
    }

    private function getAlbumData($id, Request $request) {
        $data = [
            'album' => $this->albumService->getAlbumById($id)
        ];

        return $data;
    }

    /**
     * Display the heck out of an album including its tracks
     *
     * @param $id
     * @param Request $request
     */
    public function getAlbum($id, Request $request) {
        return view('album/album', $this->getAlbumData($id, $request));
    }

    /**
     * Display the heck out of an album including its tracks
     *
     * @param $id
     * @param Request $request
     */
    public function restGetAlbum($id, Request $request) {
        $data = $this->getAlbumData($id, $request);
        $data['album']->load(['images', 'tracks']);
        return $data;
    }



}
