@extends('admin.layouts.app')
@section('title')
    Edit Category {{$cat->name}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{ route('categories.update',$cat->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">
                        @include('admin.categories.form')
                        <img id="output_image" class="img-responsive col-md-4 pull-right" />
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Edit Category {{$cat->name}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
