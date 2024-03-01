@section('page_title')
{{ "Use Guide" }}
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Use Guide') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-2">Welcome to the Inventory Management System</h1>
                    <p class="mb-4">This is a simple inventory management system that allows you to manage items, boxes, and loans. It is built with Laravel and Livewire.</p>
                    <h2 class="text-xl font-semibold mb-2">Items</h2>
                    <p class="mb-4">Items are the things you want to keep track of. You can add, edit, and delete items. You can also view the details of an item.</p>
                    <h2 class="text-xl font-semibold mb-2">Boxes</h2>
                    <p class="mb-4">Boxes are containers for items. You can add, edit, and delete boxes. You can also view the details of a box.</p>
                    <h2 class="text-xl font-semibold mb-2">Loans</h2>
                    <p class="mb-4">Loans are the records of items being lent out. You can add, edit, and delete loans. You can also view the details of a loan.</p>
                    <h2 class="text-xl font-semibold mb-2">Dark Mode</h2>
                    <p class="mb-4">This system has a dark mode. You can toggle dark mode by clicking the moon icon in the top right corner of the page.</p>
                    <h2 class="text-xl font-semibold mb-2">User Profile</h2>
                    <p class="mb-4">You can view and edit your user profile by clicking your name in the top right corner of the page and selecting "Profile".</p>
                    <h2 class="text-xl font-semibold mb-2">Log Out</h2>
                    <p class="mb-4">You can log out by clicking your name in the top right corner of the page and selecting "Log Out".</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
