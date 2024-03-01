@section('page_title')
{{ "Items" }}
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('items.index') }}" class="text-gray-400 dark:text-gray-600 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:underline">Items</a> /
            <a href="{{ route('items.show', $item->id) }}" class="text-gray-400 dark:text-gray-600 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:underline">{{ $item->name }}</a> /
            Edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <!-- Back arrow -->
                <a href="{{ route('items.show', $item->id) }}" class="flex items-center whitespace-nowrap rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back
                </a>

                <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center gap-2 w-full px-4 py-2 text-center text-md font-medium rounded-md shadow-lg bg-red-500 dark:text-gray-200 ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        Delete
                    </button>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-neutral-300 text-sm font-bold mb-">Name:</label>
                            <input type="text" name="name" id="name" value="{{ $item->name }}" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-neutral-300 text-sm font-bold mb-2">Description:</label>
                            <textarea name="description" rows="5" id="description" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full" style="resize: none;">{{ $item->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="picture" class="block text-neutral-300 text-sm font-bold mb-2">Picture:</label>
                            <input type="file" name="picture" id="picture" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 py-3 w-full">
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-neutral-300 text-sm font-bold mb-2">Price:</label>
                            <input type="number" name="price" id="price" value="{{ $item->price }}" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full">
                        </div>

                        <div class="mb-4">
                            <label for="box" class="block text-neutral-300 text-sm font-bold mb-2">Box:</label>
                            <!-- boxes have label and in items corresponds to box_id -->
                            <select name="box_id" id="box" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full">
                                <option value="">Select a box</option>
                                @foreach ($boxes as $box)
                                <option value="{{ $box->id }}" @if ($box->id === $item->box_id) selected @endif>{{ $box->label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">Update Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>