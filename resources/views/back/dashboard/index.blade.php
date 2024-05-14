@extends('back.layout.template')

@section('title', 'Dashboard')

@section('content')

    <main class="p-4 -mt-6 sm:ml-56">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <a href="{{url('article')}}" class="block max-w-md p-3 bg-gray-200 border border-gray-300 rounded-lg shadow hover:bg-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600">
            <p class="mb-2 text-lg font-normal text-gray-500 dark:text-gray-300">Total Articles</p>
            <hr class="border-gray-100 dark:border-gray-400">
            <h5 class="mt-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$total_articles}} Articles</h5>
        </a>

        <div class="mt-8 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3">Published Article</h1>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-slate-200 dark:text-slate-300">
                <thead class="text-m text-gray-700 uppercase bg-gray-50 dark:bg-slate-500 dark:text-slate-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Article Name</th>
                        <th scope="col" class="px-6 py-3">Publish Date</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latest_article as $item)
                        <tr class="odd:bg-white odd:dark:bg-gray-700 even:bg-gray-50 even:dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-3">{{$loop->iteration}}</td>
                            <td class="px-6 py-3">{{$item->title}}</td>
                            <td class="px-6 py-3">{{$item->publish_date}}</td>
                            <td class="flex items-center px-6 py-3">
                                <a href="{{url('article/'.$item->id)}}" class="font-medium text-indigo-500 dark:text-indigo-500 hover:underline">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

    </main>

@endsection
