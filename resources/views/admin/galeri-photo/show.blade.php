<x-app-layout>
    <title>{{ $pageTitle }} | {{ config('app.name', 'Laravel') }}</title>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $album->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white font-extrabold font- m-auto">
                    <!-- Display the album name -->
                    <h3 class="text-center text-xl mb-2">{{ $album->title }}</h3>

                    <!-- start label category -->

                    <div class="ml-10 mt-4 mb-3">
                        <span 
                        class="bg-blue-100 text-white text-l font-sans me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-white">
                        {{ $album->category }}
                    </span>
                    </div>

                    <!-- end label category -->

                    <!-- start content category -->
                    
                    <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            <!-- Items -->
                            @foreach ($album->image as $images)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('storage/'.$images->path) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="flex justify-center items-center pt-4">
                            <button type="button" class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- end content category -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
