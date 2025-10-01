
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-medium text-gray-900">
                        {{ __('Edit Category') }}
                    </h1>

                    <div class="mt-6">
                        <form action="{{ route('categories.update', $category) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            <div class="mt-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $category->description) }}</textarea>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ route('categories.index') }}" class="ml-4 text-gray-500 hover:text-gray-700">{{ __('Cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
