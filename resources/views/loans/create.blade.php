@section('page_title')
{{ "Loans" }}
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('loans.index') }}" class="text-gray-400 dark:text-gray-600 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:underline">Loans</a> /
            Create
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
                    <form action="{{ route('loans.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="item_id" class="block text-neutral-300 text-sm font-bold mb-2">Item:</label>
                            <select name="item_id" id="item_id" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full">
                                <option value="">Select an item</option>
                                @foreach ($items as $item)
                                <option value="{{ $item->id }}" {{ old('item_id', isset($selectedItem) ? $selectedItem : '') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="due_date" class="block text-neutral-300 text-sm font-bold mb-2">Due Date:</label>
                            <!-- Default due date will be 2 weeks from actual date -->
                            <input type="date" name="due_date" id="due_date" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full" value="{{ date('Y-m-d', strtotime('+2 weeks')) }}">
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">Borrow</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>