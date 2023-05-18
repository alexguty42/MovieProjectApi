<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase History</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.4/tailwind.min.css">
</head>
<x-app-layout>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Purchase History</h1>

        @if (empty($purchaseHistory))
            <p class="text-gray-600">No purchase history available.</p>
        @else
            <table class="w-full bg-white shadow-md rounded">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200 font-bold text-gray-700">Order ID</th>
                        <th class="py-2 px-4 bg-gray-200 font-bold text-gray-700">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseHistory as $purchase)
                    <tr class="text-center">
                        <td class="border py-2 px-4">{{ $purchase['id'] }}</td>
                        <td class="border py-2 px-4">{{ $purchase['date'] }}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('movies.index') }}" class="mt-8 inline-block bg-gray-800 hover:bg-gray-700 text-white font-bold px-6 py-3 rounded">Go back to movie list</a>
    </div>
</x-app-layout>
</body>
</html>
