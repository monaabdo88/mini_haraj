@extends('layouts.frontend')
@section('content')
    <div class="content-wrapper up-container">

        <!-- Stunning Header -->

        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">Tag: {{$tag->tag}}</h1>
            </div>
        </div>

        <!-- End Stunning Header -->

        <!-- Post Details -->


        <div class="container">
            <div class="row medium-padding80">
                <main class="main">

                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach($tag->posts()->where('status',1)->get() as $post)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                        <div class="case-item__thumb">
                                            <img src="{{asset('uploads/'.$post->featured)}}" alt="{{$post->title}}" style="height: 250px">
                                        </div>
                                        <h6 class="case-item__title"><a href="{{url('/post/'.$post->slug)}}">{{$post->title}}</a></h6>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End Post Details -->
                    <br>
                    <br>
                    <br>
                    <!-- Sidebar-->
                    <!-- End Sidebar-->

                </main>
            </div>
        </div>

@endsection