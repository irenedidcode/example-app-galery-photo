<x-app-layout>
    <title> {{$pageTitle}} | {{ config('app.name', 'Laravel') }}</title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{-- start form --}}


                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-5">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Create New Product
                                </h3>
                            </div>
                            <!-- Modal body -->
                            <form 
                            action="{{ route('admin-store-galeri-photo') }}" 
                            method="POST" 
                            enctype="multipart/form-data">
                            @csrf
                                    <div class="col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                            Album Name
                                        </label>
                                        <input
                                        type="text"
                                        name="title"
                                        id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type album name" >
                                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                    </div>

                                    <div class="col-span-2 sm:col-span-1">

                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="multiple_files">Upload Images
                                        </label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="multiple_files"
                                            type="file"
                                            name="images[]" 
                                            multiple />

                                    </div>

                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                                        <select id="category"
                                        name="category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                            <option selected="">Select category</option>
                                            @foreach ($listCategory as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-span-2">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">
                                            Album Description
                                        </label>
                                        <textarea
                                        id="desc"
                                        name="desc"
                                        rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                        placeholder="Write album description here"></textarea>
                                        <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                                </div>
                                <button type="submit" class="my-3 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Tambah
                                </button>
                            </form>
                        </div>
  </div>

                        {{-- end form --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
