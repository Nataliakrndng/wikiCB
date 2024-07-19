@extends('layouts.app')

@section('content')
    <main id="body">
        <!-- Slider Start -->
        <section class="page-title bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h1>{{ $article->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="post post-single">
                            <h1 class="post-title">{{ $article->title }}</h2>
                            <div class="post-meta">
                                <ul>
                                    <li>
                                        <i class="ion-calendar"></i> {{ \Carbon\Carbon::parse($article->publish_date)->format('d M Y') }}
                                    </li>
                                    <li>
                                        <i class="ion-android-people"></i> POSTED BY ADMIN
                                    </li>
                                    <li>
                                        <a href="{{ url('category/'.$article->Category->slug) }}"><i class="ion-pricetags"></i> {{$article->Category->name}}</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="post-thumb">
                                <img class="img-fluid" src="images/blog/blog-post-1.jpg" alt="">
                            </div>
                            <div class="post-content post-excerpt">
                                {{!! $article->desc !!}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
 @endsection
