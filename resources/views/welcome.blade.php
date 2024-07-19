@extends('layouts.app')

@section('content')
<main id="body">
    <!-- Slider Start -->
    <section class="slider">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1 class="animated fadeInUp">Core Backend<br> Source</h1>
                        <p class="animated fadeInUp">Documentation Web for all Core-backend User</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section>
        <div class="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title" style="color: #655E7A; font-weight: 600; margin-bottom: 50px; text-align: center;">Categories</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($categories as $item)
                        <div class="col-md-6">
                            <div class="card" style="margin-bottom: 50px; text-align: center;">
                                <div class="card-body">
                                    <div class="icon" style="font-size: 30px; color: #655E7A; margin-bottom: 20px;">
                                        @php
                                            $imagePath = null;
                                            $formats = ['png', 'jpg', 'jpeg'];
                                            foreach ($formats as $format) {
                                                $path = 'images/' . strtolower($item->name) . '.' . $format;
                                                if (file_exists(public_path($path))) {
                                                    $imagePath = asset($path);
                                                    break;
                                                }
                                            }
                                        @endphp
                                        @if($imagePath)
                                            <img src="{{ $imagePath }}" alt="{{ $item->name }} Logo" style="height: 100px; width: 100px; object-fit: contain;">
                                        @else
                                            <i class="fa fa-folder-open"></i>
                                        @endif
                                    </div>
                                    <h3 class="post-title" >
                                        <a style="color: #655E7A; font-weight: 500;" href="{{ url('category/'.$item->slug) }}">{{ $item->name }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
