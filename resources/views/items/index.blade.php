@section('page_title')
{{ "Items" }}
@endsection

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex gap-4 justify-between mb-8">
                <div class="flex gap-4">
                    <a href="{{ route('items.create') }}" class="flex items-center whitespace-nowrap rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        New Item
                    </a>

                    <div class="flex items-center">
                        <input type="checkbox" id="showOnlyAvailable" class="hidden rounded shadow-sm focus:border-0 focus:ring-0 dark:focus:border-0 dark:focus:ring-0">
                        <label for="showOnlyAvailable" id="showOnlyAvailableLabel" class="w-52 text-center cursor-pointer whitespace-nowrap rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">
                            Show only available items
                        </label>
                    </div>
                </div>

                <!-- Dynamic search -->
                <div class="flex items-center bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-72">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>


                    <input type="text" name="search" id="search" class="text-sm bg-transparent border-none focus:outline-none focus:ring-0 w-full text-gray-900 dark:text-gray-200 placeholder:text-gray-400" placeholder="Search items">
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full w-full" id="items-table">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    Description
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    Picture
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    Price
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    Box
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    Actions
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    Available
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($items as $item)
                            <tr class="item-row cursor-pointer hover:bg-gray-750" data-id="{{ $item->id }}" data-available="{{ $item->activeLoan() ? 'false' : 'true' }}">
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ $item->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm text-gray-900 dark:text-gray-200">{{ $item->description }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center h-20 w-20">
                                        @if ($item->picture)
                                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-20 w-20">
                                        @else
                                        <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-20 w-20">
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-center text-sm text-gray-900 dark:text-gray-200">${{ $item->price }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm text-gray-900 dark:text-gray-200">
                                        @if ($item->box_id)
                                        {{ $item->box->label }}
                                        @else
                                        No box
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-center gap-2">
                                        @php
                                        $activeLoan = $item->activeLoan();
                                        @endphp

                                        <a href="{{ route('items.edit', $item->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 focus:outline-none focus:underline">Edit</a>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 focus:outline-none focus:underline">Delete</button>
                                        </form>

                                        @if ($activeLoan)
                                        <a href="{{ route('loans.show', $activeLoan->id) }}" class="text-orange-600 dark:text-orange-400 hover:text-orange-900 dark:hover:text-orange-300 focus:outline-none focus:underline">View loan details</a>
                                        @else
                                        <a href="{{ route('loans.create', ['item_id' => $item->id]) }}" class="text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300 focus:outline-none focus:underline">Borrow</a>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-center">
                                        @if ($activeLoan)
                                        <div class="h-4 w-4 rounded-full bg-red-500"></div>
                                        @else
                                        <div class="h-4 w-4 rounded-full bg-green-500"></div>
                                        @endif
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

    <script type="module" src="{{ asset('js/itemsMain.js') }}"></script>
</x-app-layout>