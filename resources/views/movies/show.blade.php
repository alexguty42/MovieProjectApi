<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <title>Details</title>

</head>

<x-app-layout>
    <body>
    <div class="bg-gray-900 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-semibold text-xl text-white leading-tight py-5 ml-6">
                    {{ __('Movie Details') }}
                </h2>
                <div class="p-6 bg-gray-800 border-b border-gray-200 flex items-center text-white">
                    <div class="flex-1">
                        <h2 class="text-xl text-white font-semibold">Director: {{ $movie['director'] }}</h2>
                        <p class="text-gray-300 py-2">Year: {{ $movie['year'] }}</p>
                        <p class="text-gray-300 py-2">Genre: {{ $movie['genre'] }}</p>
                        <p class="text-gray-300 py-2">Duration: {{ $movie['duration'] }}</p>
                        <p class="text-gray-300 py-2">Price: {{ $movie['price'] }} €</p>

                        <form action="{{ route('cart.add', $movie['id']) }}" method="POST" class="text-white">
                            @csrf
                            <input type="hidden" name="movie_id" value="{{ $movie['id'] }}">
                            <input type="hidden" name="director" value="{{ $movie['director'] }}">
                            <input type="hidden" name="year" value="{{ $movie['year'] }}">
                            <input type="hidden" name="genre" value="{{ $movie['genre'] }}">
                            <input type="hidden" name="price" value="{{ $movie['price'] }}">

                            <button type="submit" class="mt-4 bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                    <div>
                        <img src="{{ $movie['img'] }}" width="200px">
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
</x-app-layout>
