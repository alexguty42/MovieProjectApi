<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{

    public function add(Request $request, $id)
{
    $apiKey = "lOOXw7XqBiPLGhPxrNFn7PJPEDecXa2AGV5dR8mO";
    $apiUrl = "https://vigorous-golick.212-227-169-165.plesk.page/api/movies/{$id}";

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $apiKey,
        'Accept' => 'application/json',
    ])->get($apiUrl);

    $movieDetails = $response->json();

    if ($response->successful()) {
        $movieDetails = $movieDetails[0];
        $cart = $request->session()->get('cart', []);
        $cart[$id] = $movieDetails;
        $cart[$id]['price'] = $movieDetails['price'];
        $request->session()->put('cart', $cart);
        return redirect()->route('cart.show');
    }



    return response()->json(['message' => 'Movie not found'], 404);
}


public function show(Request $request)
{
    $cart = $request->session()->get('cart', []);
    $cartTotal = 0;
    $movies = [];

    foreach ($cart as $item) {
        if (is_array($item) && isset($item['price'])) {
            $cartTotal += $item['price'];
            $movies[] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'year' => $item['year'],
                'director' => $item['director'],
                'genre' => $item['genre'],
                'duration' => $item['duration'],
                'rating' => $item['rating'],
                'price' => $item['price'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['updated_at'],
            ];
        }
    }

    return view('cart.show', compact('movies', 'cartTotal'));
}

public function remove(Request $request, $id)
{
    $cart = $request->session()->get('cart', []);

    $index = array_search($id, array_column($cart, 'id'));

    if ($index !== false) {
        array_splice($cart, $index, 1);

        $request->session()->put('cart', $cart);
    }

    $movies = [];
    $cartTotal = 0;

    foreach ($cart as $item) {
        if (is_array($item) && isset($item['price'])) {
            $cartTotal += $item['price'];

            $movies[] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'year' => $item['year'],
                'director' => $item['director'],
                'genre' => $item['genre'],
                'duration' => $item['duration'],
                'rating' => $item['rating'],
                'price' => $item['price'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['updated_at'],
            ];
        }
    }

    return view('cart.show', compact('movies', 'cartTotal'));
}

public function purchase(Request $request)
{
    $cartItems = $request->session()->get('cart', []);
    $total = 0;

    foreach ($cartItems as $item) {
        $total += $item['price'];
    }

    $request->session()->forget('cart');

    $purchase = [
        'id' => uniqid(),
        'date' => now(),
        'total' => $total,
    ];

    $purchaseHistory = $request->session()->get('purchaseHistory', []);
    $purchaseHistory[] = $purchase;
    $request->session()->put('purchaseHistory', $purchaseHistory);

    return redirect()->route('purchase.success')->with('success', 'Purchase completed successfully');
}


public function purchaseSuccess()
{
    return view('purchase.success');
}

public function purchaseHistory()
{
    $purchaseHistory = session('purchaseHistory', []);

    return view('purchase.history', compact('purchaseHistory'));
}



}
