@extends('back.layout.template')

@section('title', 'Create Article')

@section('content')

    <main class="p-4 -mt-6 sm:ml-56">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Article</h1>
        </div>

        <button class="btn btn-outline-dark mb-3"> <a href="{{ url('article')}}">Back </a> </button>

        @if (@session('success'))
            <div id="alert-3" class="mb-3 flex items-center p-4 mb-2 text-green-800 rounded-lg bg-green-50 dark:bg-slate-700 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-3 flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
          </div>
        @endif

        <div class="p-4 bg-slate-500 shadow-md shadow-slate-500/40 sm:rounded-lg">

            <form action="{{url('article')}}" class="w-full" method="post" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <label for="title" class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2">
                        Title
                      </label>
                      <input type="text" name= "title" id="title" placeholder="Title" value="{{ old('title') }}" class="appearance-none block w-full bg-slate-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2" for="category_id">
                            Category
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-slate-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="category_id" id="category_id">
                                <option hidden> Choose a Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2" for="desc">
                          Description
                        </label>
                        <textarea name="desc" id="editor"></textarea>
                    </div>
                    <div class="w-full px-3 mb-6 mt-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2" for="img">
                          Image (max 2mb)
                        </label>
                        <input class="block w-full text-sm border border-gray-200 text-gray-700 rounded-lg cursor-pointer bg-slate-100 dark:text-gray-500 p-2 focus:outline-none dark:bg-slate-100 dark:border-slate-100 dark:placeholder-gray-400" name="img" id="img" type="file" onchange="previewImage(event)">
                        <img id="img-preview" class="mt-2" style="max-width: 200px; max-height: 200px;"/>
                    </div>
                    <div class="w-full md:w-1/2 mt-3 px-3">
                        <label class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2" for="status">
                            Status
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-slate-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="status" id="status">
                                <option hidden> Choose a Status</option>
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 mt-3 px-3">
                        <label class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2" for="publish_date">
                            Publish Date
                        </label>
                        <input class="appearance-none block w-full bg-slate-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="publish_date" type="date" name="publish_date" >
                    </div>
                    <div class="w-full flex justify-end px-3 mt-3">
                        <button type="submit" class="justify-items-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script src={{ asset('ckeditor/ckeditor.js') }}></script>>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ url("upload", ["_token" => csrf_token()]) }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection

@push('jsDataTabless')
    <script src={{ asset('js/jquery.js') }}></script>
@endpush
