<x-app-layout>
    <title> {{$pageTitle}} | {{ config('app.name', 'Laravel') }}</title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{-- start tombol tambah --}}
                        <button type="button" class="mb-1.5 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-slate-950 focus:ring-4 focus:outline-none focus:ring-blue-300">
                           <a href="{{ route('admin-create-galeri-photo') }}">
                            Tambah Data
                           </a>
                        </button>
                        {{-- end tombol tambah --}}

                        {{-- start display data posts --}}

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                                    <thead class="text-xs text-white uppercase bg-gray-600 border-b border-white-400 dark:text-white">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                #
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Title
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Category
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
                                        <tr class="bg-gray-600 border-white-400 hover:bg-gray-500 text-white">
                                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white-100">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $post->title }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $post->desc }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $post->category }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ __('BELOM ADA GAMBAR PRET') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <a 
                                                href="{{ route('admin-edit-galeri-photo', [$post->id]) }}" 
                                                class="text-center font-medium text-white hover:underline">
                                                Edit
                                                </a>
                                                <hr>
                                                <a 
                                                href="{{ route('admin-hapus-galeri-photo') }}" 
                                                class="text-center font-medium text-white hover:underline">
                                                Delete
                                                </a>
                                            </td>
                                            @empty
                                            <th class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                                                    <span class="font-medium">Warning alert!</span> Gadak data weh
                                                </div>
                                            </th>
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
