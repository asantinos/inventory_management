<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('items.index') }}" class="text-gray-400 dark:text-gray-600 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:underline">Items</a> /
            Create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-neutral-300 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-neutral-300 text-sm font-bold mb-2">Description:</label>
                            <textarea name="description" rows="5" id="description" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full" style="resize: none;"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="picture" class="block text-neutral-300 text-sm font-bold mb-2">Picture:</label>
                            <input type="file" name="picture" id="picture" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 py-3 w-full">
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-neutral-300 text-sm font-bold mb-2">Price:</label>
                            <input type="number" name="price" id="price" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full">
                        </div>

                        <div class="mb-4">
                            <label for="box" class="block text-neutral-300 text-sm font-bold mb-2">Box:</label>
                            <!-- boxes have label and in items corresponds to box_id -->
                            <select name="box_id" id="box" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full">
                                <option value="">Select a box</option>
                                @foreach ($boxes as $box)
                                <option value="{{ $box->id }}">{{ $box->label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">Create Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>