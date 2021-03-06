@extends('admin.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

@endsection
@section('title')
Categories Trash
@endsection
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Categories Trash</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cats as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>@if($cat->type == 0) Main Category @else Sub Category @endif</td>
                                <td>
                                    @if($cat->status == 0)
                                        <button class="btn btn-warning">Not Active</button>
                                    @else
                                        <button class="btn btn-primary">Active</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('categories.restore',['id'=>$cat->id])}}" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
                                    <a href="{{ route('categories.kill',['id'=>$cat->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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