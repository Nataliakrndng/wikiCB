    @extends('layouts.app')

    @section('content')
        <main id="body">
            <!-- Slider Start -->
            <section class="page-title bg-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h1>{{$category->name}} - Articles</h1>
                                <p>List of all the articles under the category {{ $category->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="page-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            @foreach ($articles as $item)
                                <div class="post">
                                    <div class="post-media post-thumb">
                                        <a href="#">
                                            <img src="{{ asset('storage/back/' . $item->img) }}" alt="" style="width: 100%; height: 300px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="{{url('articles/'. $item->slug)}}" style="text-decoration: none;">{{ $item->title }}</a>
                                    </h3>
                                    <div class="post-meta">
                                        <ul>
                                            <li>
                                                <i class="ion-calendar"></i> {{ \Carbon\Carbon::parse($item->publish_date)->format('d M Y') }}
                                            </li>
                                            <li>
                                                <i class="ion-android-people"></i> POSTED BY ADMIN
                                            </li>
                                            <li>
                                                <a href="{{ url('category/'.$item->Category->slug) }}"><i class="ion-pricetags"></i> {{$item->Category->name}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-content">
                                        <p style="word-wrap: break-word; white-space: normal;">
                                            {{ Str::limit(strip_tags($item->desc), 450, '...') }}
                                        </p>
                                        <a href="{{url('articles/'. $item->slug)}}" class="btn-main" style="text-decoration: none;">Continue Reading</a>
                                    </div>
                                </div>
                            @endforeach

                            <div>
                                {{ $articles->links() }}
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="pl-0 pl-xl-4">
                                <aside class="sidebar pt-5 pt-lg-0 mt-5 mt-lg-0">
                                    <!-- Widget Latest Posts -->
                                    <div class="widget widget-latest-post">
                                        <h4 class="widget-title">Latest Posts</h4>
                                        @foreach ($latest_post as $item)
                                            <div class="media">
                                                <a class="pull-left" href="{{url('articles/'. $item->slug)}}">
                                                    <img class="media-object" src="{{ asset('storage/back/' . $item->img) }}" style="height: 75px; object-fit: cover;">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="{{url('articles/'. $item->slug)}}">{{$item->title}}</a></h4>
                                                    <p>{{ Str::limit(strip_tags($item->desc), 40) }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="widget widget-category">
                                        <h4 class="widget-title">Categories</h4>

                                        @foreach ($categories as $item)
                                            <ul class="widget-category-list">
                                                <li><a>{{$item->name}}</a></li>
                                            </ul>
                                        @endforeach
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    @endsection
