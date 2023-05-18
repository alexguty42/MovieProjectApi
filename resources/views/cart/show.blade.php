<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.4/tailwind.min.css">
    <title>Cart</title>
</head>
<x-app-layout>
<h1 class="text-2xl font-bold mb-4 mt-5 ml-14">Movie Cart</h1>

@if ($movies)
<div class="overflow-x-auto flex justify-center">
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td class="border px-4 py-2 text-center">{{ $movie['id'] }}</td>
                <td class="border px-4 py-2 text-center">{{ $movie['title'] }}</td>
                <td class="border px-4 py-2 text-center">${{ $movie['price'] }}</td>
                <td class="border px-4 py-2 text-center">
                    <form action="{{ route('cart.remove', $movie['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Remove</button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



<div class="mt-4">
    <p class="text-xl font-bold ml-14">Total of cart: ${{ $cartTotal }}</p>
    <form action="{{ route('purchase') }}" method="POST">
        @csrf
        <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4 ml-14 inline-block">Buy</button>

    </form>
    <a href="{{ route('movies.index') }}" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4 inline-block ml-14">Continue shopping</a>
</div>





@else
    <p>There are no movies in the cart.</p>
    <a href="{{ route('movies.index') }}" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4 inline-block">Go to movie list</a>
@endif

</body>
</html>
</x-app-layout>
