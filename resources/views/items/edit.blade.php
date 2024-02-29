<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <!-- Show the name of the item -->
            {{ __('Edit Item') }} ({{ $item->name }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-neutral-300 text-sm font-bold mb-">Name:</label>
                            <input type="text" name="name" id="name" value="{{ $item->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-neutral-300 text-sm font-bold mb-2">Description:</label>
                            <textarea name="description" rows="5" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" style="resize: none;">{{ $item->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="picture" class="block text-neutral-300 text-sm font-bold mb-2">Picture:</label>
                            <input type="file" name="picture" id="picture" class="shadow appearance-none border rounded w-full py-2 px-3 text-neutral-300 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-neutral-300 text-sm font-bold mb-2">Price:</label>
                            <input type="number" name="price" id="price" value="{{ $item->price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="box" class="block text-neutral-300 text-sm font-bold mb-2">Box:</label>
                            <!-- boxes have label and in items corresponds to box_id -->
                            <select name="box_id" id="box" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select a box</option>
                                @foreach ($boxes as $box)
                                <option value="{{ $box->id }}" @if ($box->id === $item->box_id) selected @endif>{{ $box->label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>