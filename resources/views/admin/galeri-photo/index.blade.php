<x-app-layout>
    <title> {{$pageTitle}} | {{ config('app.name', 'Laravel') }}</title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $pageTitle }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{-- start tombol tambah --}}
                        <div>
                            <button 
                                type="button" 
                                class="mb-2.5 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <a href="{{ route('admin-create-galeri-photo') }}">
                                        Tambah Data
                                    </a>
                            </button>
                                @if (session('status') === 'deleted-successfully')
                                <div
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400" >
                                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info!</span>
                                            <div>
                                            <span class="font-medium">Danger!!!</span> Data deleted successfully! 🤪
                                            </div>
                                        </div>
                                    </p>
                                @endif
                            </div>
                        </div>
                        {{-- end tombol tambah --}}

                        {{-- start display data posts --}}

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>

                                            <th scope="col" class="px-6 py-3">
                                                ID
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Title
                                            </th>
                                            
                                            <th scope="col" class="px-6 py-3">
                                                Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Picture
                                             </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                             </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($listPost as $post)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $post->id }}
                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                                   {{ $post->title }}

                                                </th>
                                                
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                   {{ $post->desc }}
                                                </th>

                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    @if (count($post->image) > 0)
                                                        {{ 'Gambar ' . (count($post->image)) }}
                                                    @else
                                                        {{ 'Gambar 0' }}
                                                    @endif
                                                 </th>
                                                <td class="px-6 py-4  text-center flex gap-2">
                                                    <a href="{{ route('admin-edit-galeri-photo', [$post->slug]) }}" class="text-blue-600">edit</a>
                                                    <a href="{{ route('admin-show-galeri-photo', [$post->slug]) }}" class="text-white-500">view</a>
                                                    <form method="POST" action="{{ route('admin-delete-album', $post) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <a class="text-red-500" 
                                                        href="route('admin-delete-album', $post)" 
                                                        onclick="event.preventDefault(); 
                                                            if(confirm('Are you sure?????????')) this.closest('form').submit();">
                                                            {{ __('delete') }}
                                                        </a>
                                                    </form>
                                                    {{-- <a href="{{ route('admin-delete-galeri-photo', [$post->id]) }}" class="text-red-500">delete</a> --}}
                                                </td>
                                                @empty
                                                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                                                    <span class="font-medium">Galeri photo belum ada...</span>
                                                </div>
                                                @endforelse

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        {{-- end display data posts --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
