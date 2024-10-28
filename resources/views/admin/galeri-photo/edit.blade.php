<x-app-layout>
    <title>{{ $pageTitle }} | {{ config('app.name', 'Laravel') }}</title>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ini Halaman Edit') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Modal body -->

                <form method="POST" 
                    action="{{ route('admin-update-galeri-photo',[$post->slug]) }}" 
                    enctype="multipart/form-data"
                    class="p-4 md:p-5">
                    @csrf
                    @method('put')

                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Album
                            </label>
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Ketik nama album anda" value="{{$post->title}}">
                        </div>
                        {{-- GAMBAR --}}
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="large_size">Unggah Foto</label>
                            <input
                                class="w-full text-lg text-gray-900 border border-gray-300 bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                name="images[]" id="multiple_files" type="file" multiple>
                                <div class="mt-2">
                                    @forelse ($images as $image)
                                        <p> <img src="{{ asset('storage/' . $image->path) }}" alt="" class="w-16 border rounded-xl h-16"></p>
                                        <p> {{ $image->name }}</p>
                                    @empty
                                        
                                    @endforelse
                                </div>
                        </div>
                        {{-- CATEGORIES --}}
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <select id="category" name="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">{{$post->category}}</option>
                                @foreach ($listCategory as $key => $item)
                                    <option value="{{ $item }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Keterangan Album
                            </label>
                            <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                            <textarea id="desc" rows="4" name="desc"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ketik keterangan album anda disini">{{$post->desc}}</textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <a href="{{ route('admin-update-galeri-photo', [$post->slug]) }}">
                            Edit
                        </a>
                    </button>
                </form>

                <button type="button"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="{{ route('admin-galeri-photo') }}">
                        Cancel
                    </a>
                </button>

            </div>
        </div>
    </div>
</x-app-layout>
