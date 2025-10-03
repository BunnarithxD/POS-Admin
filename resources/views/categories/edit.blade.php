<x-app-layout>
    <x-slot name="header">
        {{-- Header slot updated for dark mode text --}}
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    {{-- Main page background adapted for dark mode --}}
    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Card container adapted for dark mode --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Inner padding and border adapted --}}
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    {{-- Title adapted for dark mode --}}
                    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                        {{ __('Edit Category') }}
                    </h1>

                    <div class="mt-6 max-w-xl">
                        <form action="{{ route('categories.update', $category) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Category Name Field --}}
                            <div class="mb-6">
                                {{-- Label adapted for dark mode --}}
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Name') }}</label>
                                {{-- Input adapted for dark mode: dark background, light text, consistent border --}}
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    value="{{ old('name', $category->name) }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm 
                                           focus:border-indigo-500 focus:ring-indigo-500 
                                           dark:bg-gray-700 dark:text-white" 
                                    required>
                                @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            {{-- Status Field (NEWLY ADDED) --}}
                            <div class="mb-6">
                                {{-- Label adapted for dark mode --}}
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Status') }}</label>
                                <select 
                                    name="status" 
                                    id="status" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm 
                                           focus:border-indigo-500 focus:ring-indigo-500 
                                           dark:bg-gray-700 dark:text-white"
                                    required>
                                    {{-- Use old('status', $category->status) to set the currently saved or old value --}}
                                    <option value="Actived" {{ old('status', $category->status) == 'Actived' ? 'selected' : '' }}>Actived</option>
                                    <option value="InActive" {{ old('status', $category->status) == 'InActive' ? 'selected' : '' }}>InActive</option>
                                </select>
                                @error('status') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            {{-- Description Field --}}
                            <div class="mt-4 mb-6">
                                {{-- Label adapted for dark mode --}}
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Description') }}</label>
                                {{-- Textarea adapted for dark mode: dark background, light text, consistent border --}}
                                <textarea 
                                    name="description" 
                                    id="description" 
                                    rows="4" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm 
                                           focus:border-indigo-500 focus:ring-indigo-500 
                                           dark:bg-gray-700 dark:text-white"
                                >{{ old('description', $category->description) }}</textarea>
                                @error('description') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="mt-6 flex items-center justify-end">
                                <a href="{{ route('categories.index') }}" 
                                   class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 transition duration-150">
                                    {{ __('Cancel') }}
                                </a>
                                {{-- Update Button: Maintained bright color, ensured offset ring works in dark mode --}}
                                <button type="submit" 
                                        class="ml-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-md 
                                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 transition duration-150">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
