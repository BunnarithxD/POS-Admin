<x-app-layout>
    
    <div class="py-12 min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
            {{-- Main page container adapted for dark mode --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

                    {{-- Header Section: Category Title & Breadcrumb/Back Button --}}
                    <div class="flex justify-between items-center mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                        {{-- Title: White text in dark mode --}}
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                            {{ __('New Category') }} 
                        </h1>
                        {{-- Back Link: Adjusted color for better visibility on dark background --}}
                        <a href="{{ route('categories.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                            ← {{ __('Back to List') }}
                        </a>
                    </div>
                    
                    {{-- Form Card --}}
                    {{-- Card adapted for dark mode: darker background, lighter border --}}
                    <div class="max-w-xl mx-auto mt-8 p-6 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow-md">
                        
                        {{-- Form Title: White text in dark mode --}}
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">
                            {{ __('Fill in Category Details') }}
                        </h2>

                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf

                            {{-- Category Name Field --}}
                            <div class="mb-4">
                                {{-- Label: Lighter text in dark mode --}}
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    {{ __('Category Name') }} <span class="text-red-500">*</span>
                                </label>
                                {{-- Input Field: Dark background, light text, matching border in dark mode --}}
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    placeholder="e.g., Electronics, Fashion, Books"
                                    value="{{ old('name') }}"
                                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm shadow-sm 
                                        focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:text-gray-200"
                                    required>
                                @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            {{-- Status Field --}}
                            <div class="mb-4">
                                {{-- Label: Lighter text in dark mode --}}
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    {{ __('Status') }} <span class="text-red-500">*</span>
                                </label>
                                {{-- Select Field: Dark background, light text, matching border in dark mode --}}
                                <select
                                    name="status"
                                    id="status"
                                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm shadow-sm
                                        focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:text-gray-200"
                                    required>
                                    <option value="Actived" {{ old('status', 'Actived') == 'Actived' ? 'selected' : '' }}>Actived</option>
                                    <option value="InActive" {{ old('status') == 'InActive' ? 'selected' : '' }}>InActive</option>
                                </select>
                                @error('status') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            {{-- Description Field --}}
                            <div class="mb-6">
                                {{-- Label: Lighter text in dark mode --}}
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    {{ __('Description (Optional)') }}
                                </label>
                                {{-- Textarea Field: Dark background, light text, matching border in dark mode --}}
                                <textarea
                                    name="description"
                                    id="description"
                                    rows="3"
                                    placeholder="A brief explanation of this category."
                                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm shadow-sm
                                        focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:text-gray-200"
                                >{{ old('description') }}</textarea>
                                @error('description') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            {{-- Actions (Buttons) --}}
                            <div class="flex justify-end space-x-3">
                                {{-- Cancel Button: Adjusted colors for dark mode context --}}
                                <a
                                    href="{{ route('categories.index') }}"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium 
                                           text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 
                                           focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-700">
                                    {{ __('Cancel') }}
                                </a>
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white 
                                           bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-700">
                                    {{ __('Create Category') }}
                                </button>
                            </div>
                        </form>
                    </div> {{-- End Form Card --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
