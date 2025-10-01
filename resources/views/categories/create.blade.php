<x-app-layout>
    <x-slot name="header">
        <div class="border-b border-gray-700 pb-4">
            <h2 class="font-bold text-3xl text-gray-100 leading-tight">
                {{ __('Create Category') }} ⭐️
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-8 shadow-2xl sm:rounded-xl">
                
                {{-- Form Title & Description --}}
                <div class="mb-8 border-b border-gray-700 pb-4">
                    <h1 class="text-3xl font-extrabold text-indigo-400">
                        {{ __('Create a New Category') }}
                    </h1>
                    <p class="mt-2 text-gray-400">
                        {{ __('Enter the details for your new category below.') }}
                    </p>
                </div>

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    {{-- Category Name Field --}}
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-semibold text-gray-200">
                            {{ __('Category Name') }}
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            placeholder="e.g., Electronics, Fashion, Books"
                            class="block w-full px-4 py-2 rounded-lg bg-gray-700 border-gray-600 text-gray-50 placeholder-gray-500 shadow-sm 
                                focus:border-indigo-500 focus:ring-indigo-500 transition duration-150 ease-in-out" 
                            required>
                        {{-- Add error message handling here: @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror --}}
                    </div>

                    {{-- Description Field --}}
                    <div class="mt-6 space-y-2">
                        <label for="description" class="block text-sm font-semibold text-gray-200">
                            {{ __('Description (Optional)') }}
                        </label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="4" 
                            placeholder="A brief explanation of this category."
                            class="block w-full px-4 py-2 rounded-lg bg-gray-700 border-gray-600 text-gray-50 placeholder-gray-500 shadow-sm 
                                focus:border-indigo-500 focus:ring-indigo-500 transition duration-150 ease-in-out"
                            ></textarea>
                    </div>

                    {{-- Actions (Buttons) --}}
                    <div class="mt-8 flex items-center justify-start space-x-4">
                        <button 
                            type="submit" 
                            class="inline-flex items-center justify-center 
                                bg-indigo-600 hover:bg-indigo-500 text-white font-bold 
                                py-2.5 px-6 rounded-lg shadow-xl 
                                transition duration-200 ease-in-out transform hover:scale-[1.01] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            {{ __('Create Category') }} 🚀
                        </button>
                        <a 
                            href="{{ route('categories.index') }}" 
                            class="text-sm font-medium text-gray-400 hover:text-gray-300 hover:underline transition">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>