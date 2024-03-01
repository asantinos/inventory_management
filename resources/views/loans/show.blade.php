@section('page_title')
{{ "Loans" }}
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('loans.index') }}" class="text-gray-400 dark:text-gray-600 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:underline">Loans</a> /
            {{ $item->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative flex justify-between mb-8">
                <!-- Back arrow -->
                <a href="{{ route('loans.index') }}" class="flex items-center whitespace-nowrap rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="w-full flex items-center justify-between">
                            <div class="flex items-center">
                                @if ($item->picture)
                                <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-28 w-28">
                                @else
                                <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-28 w-28">
                                @endif

                                <div class="ml-6">
                                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">{{ $item->name }}</h2>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $item->description }}</p>
                                    <p class="text-gray-800 dark:text-gray-200">Borrowed by: <span class="text-gray-800 dark:text-gray-400">{{ $loan->user->name }}</span></p>
                                </div>

                                <div class="ml-12">
                                    <p class="text-gray-800 dark:text-gray-200">Price: <span class="text-gray-800 dark:text-gray-400">${{ $item->price }}</span></p>
                                    <p class="text-gray-800 dark:text-gray-200">Box: <span class="text-gray-800 dark:text-gray-400">{{ $item->box->label }}</span></p>
                                    @if ($item->activeLoan())
                                    <p class="text-red-500 dark:text-red-400">Not available</p>
                                    @else
                                    <p class="text-green-500 dark:text-green-400">Available</p>
                                    @endif
                                </div>

                                <div class="ml-12">
                                    <p class="text-gray-800 dark:text-gray-200">Checkout Date: <span class="text-gray-800 dark:text-gray-400">{{ $loan->checkout_date }}</span></p>
                                    <p class="text-gray-800 dark:text-gray-200">Due Date: <span class="text-gray-800 dark:text-gray-400">{{ $loan->due_date }}</span></p>
                                    <p class="text-gray-800 dark:text-gray-200">Returned Date: <span class="text-gray-600 dark:text-gray-400">{{ $loan->returned_date ? $loan->returned_date : 'Not returned' }}</span></p>
                                </div>
                            </div>

                            <div>
                                @if ($loan->user_id === Auth::id() && !$loan->returned_date)
                                <form action="{{ route('loans.update', ['loan' => $item->activeLoan()->id]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="flex items-center whitespace-nowrap rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Return Loan
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

</x-app-layout>