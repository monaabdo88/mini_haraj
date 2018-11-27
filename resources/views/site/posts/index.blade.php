@extends('layouts.frontend')
@section('content')
    <div class="content-wrapper up-container">

        <!-- Stunning Header -->

        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">My Posts</h1>
            </div>
        </div>

        <!-- End Stunning Header -->

        <!-- Post Details -->


        <div class="container">
            <div class="row medium-padding120">
                <main class="main">

                    <div class="row">
                        <div class="case-item-wrap">
                            @if($posts->count() > 0)
                                @foreach($posts as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{asset('uploads/'.$post->featured)}}" alt="{{$post->title}}" style="height: 250px">
                                            </div>
                                            <h6 class="case-item__title">
                                                <a href="{{url('/post/'.$post->slug)}}">{{$post->title}}</a>
                                                @if($post->user_id == Auth::user()->id)
                                                    <a href="{{url('/posts/'.$post->id.'/edit')}}" title="Edit" class="pull-right"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{url('/posts/delete/'.$post->id)}}" title="Delete" class="pull-right" style="margin-right: 10px">  <i class="fa fa-trash"></i></a>
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center alert alert-danger">There is no Posts</div>
                            @endif
                        </div>
                    </div>

                    <!-- End Post Details -->
                </main>
            </div>
        </div>

@endsection