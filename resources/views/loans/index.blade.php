<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Loans') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-between mb-8">
                <a href="{{ route('loans.create') }}" class="flex items-center whitespace-nowrap rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    New Loan
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                    User
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                    Item
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                    Checkout Date
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                    Due Date
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                    Returned Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                            <tr class="loan-row cursor-pointer hover:bg-gray-750" data-id="{{ $loan->id }}">
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ $users->find($loan->user_id)->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ $items->find($loan->item_id)->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ $loan->checkout_date }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ $loan->due_date }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                        @if ($loan->returned_date === null && $loan->user_id === Auth::id())
                                        <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-blue-600 dark:text-blue-400 hover:underline focus:outline-none">
                                                Mark as returned
                                            </button>
                                        </form>
                                        @else
                                        {{ $loan->returned_date }}
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

    <script type="module" src="{{ asset('js/loansMain.js') }}"></script>
</x-app-layout>