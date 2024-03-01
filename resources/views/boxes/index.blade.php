<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Boxes') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-between mb-8">
                <a href="{{ route('boxes.create') }}" class="flex items-center whitespace-nowrap rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    New Box
                </a>

                <!-- Dynamic search -->
                <div class="flex items-center bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-72">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>


                    <input type="text" name="search" id="search" class="bg-transparent border-none focus:outline-none focus:ring-0 w-full text-gray-900 dark:text-gray-200 placeholder:text-gray-400" placeholder="Search boxes">
                </div>

            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full w-full" id="boxes-table">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                    Label
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                    Location
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                    # Items
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($boxes as $box)
                            <tr class="box-row cursor-pointer hover:bg-gray-750" data-id="{{ $box->id }}">
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ $box->label }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm text-gray-900 dark:text-gray-200">{{ $box->location }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm text-gray-900 dark:text-gray-200">{{ $box->items->count() }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('boxes.edit', $box->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 focus:outline-none focus:underline">Edit</a>
                                        <form action="{{ route('boxes.destroy', $box->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-500 dark:hover:text-red-300 focus:outline-none focus:underline">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="{{ asset('js/boxesMain.js') }}"></script>
</x-app-layout>