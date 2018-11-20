@extends('admin.layouts.app')
@section('title')
    Add New Category
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{ url('admin/categories/') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('admin.categories.form')
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Add Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
