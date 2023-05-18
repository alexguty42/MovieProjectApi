
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <title>Movie List</title>
</head>
<x-app-layout>
<body class="bg-gray-800 dark:bg-black">

    <div class="bg-gray-900 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($movies as $movie)
                <div class="flex flex-col bg-gray-800 dark:bg-gray-900 p-2 rounded-lg shadow-md items-center text-center">
                    <img src="{{ $movie['img'] }}" width="150px" class="px-4 pt-4">
                    <h2 class="text-lg font-semibold text-white dark:text-white px-4">{{ $movie['title'] }}</h2>
                    <p class="text-sm text-white dark:text-white px-4">Price: {{ $movie['price'] }}€</p>
                    <p class="text-sm text-white dark:text-white px-4">Rating: {{ $movie['rating'] }}/10</p>
                    <a href="{{ route('movies.show', $movie['id']) }}" class="block mt-2 bg-gray-900 hover:bg-gray-700 text-white font-semibold py-1 px-3 rounded">Show Details</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>

</body>
</html>
