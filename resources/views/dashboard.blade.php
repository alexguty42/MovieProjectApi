<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("WELCOME!") }}
                    <a href="{{ route('movies.index') }}" class="inline-block mt-4 bg-blue-500 hover:bg-blue-700 dark:bg-blue-400 dark:hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Enter Movies</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
</x-app-layout>
