@extends('admin.layouts.app')
@section('title')
    Edit Category {{$tag->name}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{ route('tags.update',$tag->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">
                        @include('admin.tags.form')
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Edit Tag
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
