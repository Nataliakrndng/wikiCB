@extends('back.layout.template')

@section('title', 'List Category')

@push('datatable')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.tailwindcss.css">
@endpush

@section('content')

    <main class="p-4 -mt-6 sm:ml-56">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
        </div>

        <button class="btn btn-outline-dark mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Add</button>

        @if (@session('success'))
            <div id="alert-3" class="flex items-center p-4 mb-2 text-green-800 rounded-lg bg-green-50 dark:bg-slate-700 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-slate-200 dark:text-slate-300">
                <thead class="text-m text-gray-700 uppercase bg-gray-50 dark:bg-slate-500 dark:text-slate-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Slug</th>
                        <th scope="col" class="px-6 py-3">Created At</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr class="odd:bg-white odd:dark:bg-gray-700 even:bg-gray-50 even:dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-3">{{$loop->iteration}}</td>
                            <td class="px-6 py-3">{{$item->name}}</td>
                            <td class="px-6 py-3">{{$item->slug}}</td>
                            <td class="px-6 py-3">{{$item->created_at}}</td>
                            <td class="flex items-center px-6 py-3">
                                <a data-bs-toggle="modal" data-bs-target="#modalUpdate{{$item->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}"  class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      <!-- Modal -->
        @include('back.category.createmodal')
        @include('back.category.updatemodal')
        @include('back.category.deletemodal')

    </main>
@endsection
