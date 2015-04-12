<?php
namespace SpotifyExample\Services;

use GuzzleHttp\Client;

class SpotifyService {
    const SPOTIFY_API = 'https://api.spotify.com/v1/';
    const TYPE_TRACK = 'track';
    const TYPE_ALBUM = 'album';



    public function search($query) {

        $client = new Client();
        $response = $client->get(self::SPOTIFY_API . 'search', [
            'query' => [
                'q' => urlencode($query),
                'type' => self::TYPE_ALBUM,
            ]
        ]);

        return $response->json()['albums'];
    }
}
