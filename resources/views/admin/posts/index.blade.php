@extends('admin.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

@endsection
@section('title')
    All Posts
@endsection
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">All Posts</strong>
                    <a href="{{url('admin/postsTrash/')}}" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Trash</a>
                    <a href="{{url('admin/posts/create')}}" class="btn btn-primary pull-right">Add Post <i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><img src="{{asset('uploads/'.$post->featured)}}" class="img-responsive img-thumbnail" width="150"/></td>
                                <td>{{$post->title}}</td>
                                <td>
                                    @if($post->status == 0)
                                        <button class="btn btn-warning">Not Active</button>
                                    @else
                                        <button class="btn btn-primary">Active</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('posts.delete',['id'=>$post->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
    @if(Session()->has('success'))
        <script>
            toastr.success('{{Session()->get('success')}}');
        </script>
    @endif
@endsection