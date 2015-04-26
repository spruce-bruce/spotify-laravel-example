<?php

namespace SpotifyExample\Services;

use SpotifyExample\Models\Album;
use SpotifyExample\Models\Image;

class AlbumService {

    /**
     * @var SpotifyService
     */
    private $spotifyService;

    public function __construct(SpotifyService $spotifyService) {
        $this->spotifyService = $spotifyService;
    }

    /**
     * Search the spotify database for albums and save the results in the database
     *
     * @param $query
     * @return array
     */
    public function search($query) {
        $spotifyAlbumSearchResponse = $this->spotifyService->search($query);
        return $this->getAlbumsFromResponse($spotifyAlbumSearchResponse);
    }

    /**
     * Get albums from the database if we have them, otherwise save them and return
     * Album models
     *
     * @param $spotifyAlbumSearchResponse
     * @return array
     */
    public function getAlbumsFromResponse($spotifyAlbumSearchResponse) {
        $albums = [];
        foreach ($spotifyAlbumSearchResponse['items'] as $item) {
            $albums[] = $this->getAlbumForSpotifyItem($item);
        }

        return $albums;
    }

    /**
     * Get an album from the database if we have it otherwsie save it and return
     * an Album model
     *
     * @param $item
     * @return Album
     */
    public function getAlbumForSpotifyItem($item) {
        //Album::firstOrCreate()
        $album = Album::firstOrNew(['id' => $item['id']]);

        // If the model is either loaded from the database, or has been saved to the database since being
        // created the exists property will be true; Otherwise it will be false.
        if (!$album->exists) {
            $album->name       = $item['name'];
            $album->type       = $item['type'];
            $album->album_type = $item['album_type'];
            $album->href       = $item['href'];
            $album->uri        = $item['uri'];

            $album->save();

            $images = [];
            foreach ($item['images'] as $image) {
                $images[] = new Image([
                    'album_id' => $album->id,
                    'url'      => $image['url'],
                    'width'    => $image['width'],
                    'height'   => $image['height']
                ]);
            }

            $album->images()->saveMany($images);
        }

        return $album;
    }
}
