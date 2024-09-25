<x-app-layout>
    <title> {{$pageTitle}} | {{ config('app.name', 'Laravel') }}</title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{-- start tombol tambah --}}
                        <button type="button" class="mb-2.5 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                           <a href="{{ route('admin-create-galeri-photo') }}">
                            Tambah Data
                           </a>
                        </button>
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
                                                Tittle
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                             Category
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
                                                    {{ $post->id}}
                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                                   {{ $post->title }}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                                   {{ $post->category }}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                   {{ $post->desc }}
                                                </th>

                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{__('Belum ada gambar woi' ) }}
                                                 </th>
                                                <td class="px-6 py-4">
                                                    <a href="{{ route('admin-edit-galeri-photo', [$post->id]) }}" class="text-blue">edit</a>
                                                    <hr>
                                                    <a href="{{ route('admin-delete-galeri-photo', [$post->id]) }}" class="text-blue">delete</a>
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
