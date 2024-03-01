@section('page_title')
{{ "Items" }}
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('items.index') }}" class="text-gray-400 dark:text-gray-600 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:underline">Items</a> /
            {{ $item->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative flex justify-between mb-8">
                <!-- Back arrow -->
                <a href="{{ route('items.index') }}" class="flex items-center whitespace-nowrap rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back
                </a>

                <div>
                    <button id="options-menu-button" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">
                        Options

                        <!-- Arrow down -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-mr-1 ml-2 h-5 w-5" x`>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                </div>

                <div id="options-menu" class="hidden origin-top-right absolute top-12 right-0 w-56 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1">
                        @php
                        $activeLoan = $item->activeLoan();
                        @endphp

                        @if ($activeLoan)
                        @if ($activeLoan->user_id === auth()->user()->id)
                        <form action="{{ route('loans.update', ['loan' => $item->activeLoan()->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Return Loan</button>
                        </form>
                        @else
                        <a href="{{ route('loans.show', $activeLoan->id) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">View Loan</a>
                        @endif
                        @else
                        <a href="{{ route('loans.create', ['item_id' => $item->id]) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Borrow</a>
                        @endif

                        <a href="{{ route('items.edit', $item->id) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-200 hover:bg-red-500 hover:text-white dark:hover:bg-red-500">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($item->activeLoan())
                    <p class="text-red-500 dark:text-red-400 mb-4">Not available</p>
                    @else
                    <p class="text-green-500 dark:text-green-400 mb-4">Available</p>
                    @endif

                    <div class="mb-4">
                        <label for="name" class="block text-neutral-300 text-sm font-bold mb-2">Name:</label>
                        <p>{{ $item->name }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-neutral-300 text-sm font-bold mb-2">Description:</label>
                        <p>{{ $item->description }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="picture" class="block text-neutral-300 text-sm font-bold mb-2">Picture:</label>
                        @if ($item->picture)
                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-60 w-60">
                        @else
                        <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-60 w-60">
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-neutral-300 text-sm font-bold mb-2">Price:</label>
                        <p>${{ $item->price }}</p>
                    </div>

                    <div>
                        <label for="box" class="block text-neutral-300 text-sm font-bold mb-2">Box:</label>
                        <p>
                            @if ($item->box_id)
                            {{ $item->box->label }}
                            @else
                            No box
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/toggleOptionsMenu.js') }}"></script>

</x-app-layout>