<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ViewController extends Controller
{
    public function index()
    {
        $apiUrl = env('API_URL');
        $apiKey = 'lOOXw7XqBiPLGhPxrNFn7PJPEDecXa2AGV5dR8mO';

        $url = $apiUrl . '/api/movies';
        $client = new Client([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);

        $response = $client->get($url);

        $movies = json_decode($response->getBody(), true);
        return view('movies.index', ['movies' => $movies]);
    }

    public function show($id)
    {
        $apiUrl = env('API_URL');
        $apiKey = 'lOOXw7XqBiPLGhPxrNFn7PJPEDecXa2AGV5dR8mO';

        $url = $apiUrl . '/api/movies';
        $client = new Client([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        foreach ($data as $movie) {
            if ($movie['id'] == $id) {
                return view('movies.show', ['movie' => $movie]);
            }
        }
    }
}
