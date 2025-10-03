<x-app-layout>
{{-- Note: This implementation relies on Alpine.js (included in most Laravel/Blade setups like Breeze/Jetstream) for modal functionality. --}}
<div class="py-12 min-h-screen" 
    x-data="{ 
        showDeleteModal: false, 
        deletingCategoryName: '', 
        deletingCategoryRoute: '' 
    }">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
        {{-- Card Container: Dark background for dark mode --}}
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">

        
            <div class="flex justify-between items-center mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                {{-- Title: White text in dark mode --}}
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">
                    {{ __('Category Management') }}
                </h1>
                
                @role('admin|manager')
                <a href="{{ route('categories.create') }}" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-sm shadow-md transition duration-150 ease-in-out">
                    {{ __('New Category') }}
                </a>
                @endrole
            </div>
            
          

            @if (session('success'))
                {{-- Success Alert: Darker, less blinding alert colors --}}
                <div class="mb-4 bg-green-100 dark:bg-green-900/50 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-300 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Category Table --}}
            <div class="overflow-x-auto">
                {{-- Dark mode divider applied --}}
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 border border-gray-200 dark:border-gray-700 rounded-md">
                    {{-- Table Head: Darker header background and lighter text --}}
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('No') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Name') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Description') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Status') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('CreateAt') }}</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    {{-- Table Body: Dark background for rows, light divider --}}
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($categories as $category)
                            <tr>
                                {{-- No. --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $category->demo_no }}</td>
                                
                                {{-- Name: Brighter text for main content --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $category->name }}</td>
                                
                                {{-- Description --}}
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 max-w-xs overflow-hidden text-ellipsis">{{ $category->description ?? 'N/A' }}</td>
                                
                                {{-- Status (Using Tailwind badge classes) --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $status = $category->status ?? 'InActive';
                                        // Adjusted status colors for better contrast in dark mode
                                        $class = $status == 'Actived' 
                                            ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300' 
                                            : 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300';
                                    @endphp
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $class }}">
                                        {{ $status }}
                                    </span>
                                </td>
                                
                                {{-- CreateAt --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $category->created_at_formatted }}</td>
                                
                                {{-- Action Buttons --}}
                                @role('admin')
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex justify-center items-center space-x-2"> 
                                        
                                        {{-- Edit Button --}}
                                        <a href="{{ route('categories.edit', $category) }}" 
                                            class="text-white bg-indigo-600 hover:bg-indigo-700 py-1 px-3 rounded text-xs font-bold transition duration-150">
                                            {{ __('Edit') }}
                                        </a>

                                        {{-- Delete Button (MODIFIED to open the styled modal) --}}
                                        <button type="button" 
                                            @click="showDeleteModal = true; deletingCategoryName = '{{ $category->name }}'; deletingCategoryRoute = '{{ route('categories.destroy', $category) }}';"
                                            class="text-white bg-red-600 hover:bg-red-700 py-1 px-2 rounded text-xs font-bold transition duration-150">
                                            {{ __('Delete') }}
                                        </button>
                                    </div> 
                                </td>
                                @endrole

                            </tr>
                        @empty
                            <tr>
                                {{-- Empty state dark mode --}}
                                <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-700">
                                    No categories found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination Links --}}
            <div class="mt-4 flex justify-end">
                {{ $categories->links() }}
            </div>

        </div>
    </div>

    {{-- START OF STYLED MODAL --}}
    <div class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" 
        x-show="showDeleteModal" 
        x-cloak 
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" @click="showDeleteModal = false"></div>

        {{-- Modal Dialog --}}
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" 
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900/50 sm:mx-0 sm:h-10 sm:w-10">
                            {{-- Icon (Exclamation Triangle) --}}
                            <svg class="h-6 w-6 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                                Confirm Deletion
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Are you absolutely sure you want to delete the category **<span x-text="deletingCategoryName" class="font-bold text-red-500"></span>**? 
                                    This action is permanent and **cannot be recovered**.
                                </p>
                                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                    Please confirm if you wish to proceed.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                  
                    <form method="POST" :action="deletingCategoryRoute" class="inline-block sm:ml-3 sm:w-auto w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm transition duration-150">
                            Delete Permanently
                        </button>
                    </form>

                    <button type="button" 
                            @click="showDeleteModal = false"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm transition duration-150">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
   
</div>
</x-app-layout>
