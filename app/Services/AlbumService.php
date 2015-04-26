<?php

namespace SpotifyExample\Services;

use SpotifyExample\Models\Album;
use SpotifyExample\Models\Image;

class AlbumService {

    public function getAlbumsFromResponse($spotifyAlbumResponse)
    {
        $albums = [];
        foreach ($spotifyAlbumResponse['items'] as $item) {
            $albums[] = $this->getAlbumForSpotifyItem($item);
        }

        return $albums;
    }

    public function getAlbumForSpotifyItem($item) {
        //Album::firstOrCreate()
        $album = Album::firstOrNew(['id' => $item['id']]);

        // If the model is either loaded from the database, or has been saved to the database since being
        // created the exists property will be true; Otherwise it will be false.
        if (!$album->exists) {
            $album->name = $item['name'];
            $album->type = $item['type'];
            $album->album_type = $item['album_type'];
            $album->href = $item['href'];
            $album->uri = $item['uri'];

            $album->save();

            $images = [];
            foreach ($item['images'] as $image) {
                $images[] = new Image([
                    'album_id' => $album->id,
                    'url' => $image['url'],
                    'width' => $image['width'],
                    'height' => $image['height']
                ]);
            }

            $album->images()->saveMany($images);
        }

        return $album;
    }
}
