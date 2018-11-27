@extends('layouts.frontend')
@section('content')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="content-wrapper up-container">
        <!-- Stunning Header -->
        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">Add New Post</h1>
            </div>
        </div>

        <!-- End Stunning Header -->

        <!-- Post Details -->
    <div class="container">
         <div class="row medium-padding80">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ url('/posts/store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('site.posts.form')
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Add Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

