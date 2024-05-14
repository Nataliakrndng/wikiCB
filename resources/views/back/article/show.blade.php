@extends('back.layout.template')

@section('title', 'Detail Article')

@section('content')

    <main class="p-4 -mt-6 sm:ml-56">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Article</h1>
        </div>

        <button class="btn btn-outline-dark mb-3"> <a href="{{ url('article')}}">Back </a> </button>

        <div class="p-4 bg-slate-500 shadow-md shadow-slate-500/40 sm:rounded-lg">
            <form class="w-full" method="post" enctype="multipart/form-data">

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <label for="title" class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2">
                        Title
                      </label>
                      <input type="text" name="title" id="title" placeholder="Title" value="{{ $article->title }}" class="appearance-none block w-full bg-slate-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2" for="category_id">
                            Category
                        </label>
                        <input type="text" name= "category" id="category" placeholder="Category" value="{{ $article->Category->name }}" class="appearance-none block w-full bg-slate-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled>
                    </div>
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2" for="desc">
                          Description
                        </label>
                        <textarea name="desc" id="editor">{{ $article->desc }}</textarea>
                    </div>
                    <div class="w-full px-3 mb-6 mt-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2" for="img">
                          Image
                        </label>
                        <div class="bg-transparant border border-slate-500">
                            <a href="{{asset('storage/back/'.$article->img)}}" target="_blank" rel="noopener noreferrer">
                            <img src="{{asset('storage/back/'.$article->img)}}" alt=""class="object-contain h-96 w-full object-left-top">
                            </a>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 mt-3 px-3">
                        <label class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2" for="status">
                            Status
                        </label>
                        <input type="text" name= "status" id="status" placeholder="Status" value="{{ $article->status == 1 ? 'Published' : 'Unpublished' }}" class="appearance-none block w-full bg-slate-100 text-gray-700 font-bold border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled>
                    </div>
                    <div class="w-full md:w-1/2 mt-3 px-3">
                        <label for="publish_date" class="block uppercase tracking-wide text-gray-200 text-md font-bold mb-2">
                          Publish Date
                        </label>
                        <input type="text" name= "publish_date" id="publish_date" placeholder="Publish Date" value="{{ $article->publish_date }}" class="appearance-none block w-full bg-slate-100 font-bold text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled>
                      </div>
                </div>
            </form>
        </div>
    </main>

@endsection

@push('jsDataTabless')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.3/classic/ckeditor.js"></script>
    <script>
        var options ={
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            clipboard_handleImages: false
        }
    </script>

    <script>
        CKEDITOR.replace('editor', {
        ...options,
        readOnly: true // Set readOnly to true
    });
    </script>
@endpush
