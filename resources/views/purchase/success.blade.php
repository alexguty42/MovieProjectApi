<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase Success</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
    <x-app-layout>
    <div class="container text-center">
        <h1 class="text-5xl font-bold mb-8 py-8">Purchase Successful</h1>
        <div class="flex justify-center mb-8">
            <img src="/img/tic.png" alt="Purchase Confirmation" class="w-48">
        </div>
        <p class="text-2xl">Your purchase has been completed successfully.</p>
        <a href="{{ route('movies.index') }}" class="mt-8 inline-block px-6 py-3 bg-gray-800 hover:bg-gray-700 text-white font-bold rounded hover:bg-blue-700">Go back to movie list</a>
    </div>
    </x-app-layout>
</body>
</html>
