@extends('admin.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

@endsection
@section('title')
    All Users
@endsection
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">All Users</strong>
                    <a href="{{url('admin/usersTrash/')}}" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Trash</a>
                    <a href="{{url('admin/users/create')}}" class="btn btn-primary pull-right">Add User <i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Permission</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><img src="{{asset('uploads/avatar/'.@$user->profile->avatar)}}" class="img-responsive img-thumbnail" width="150"/></td>
                                <td>{{$user->name}}</td>
                                <td>
                                    @if($user->admin == 0)
                                        <button class="btn btn-warning">User</button>
                                    @else
                                        <button class="btn btn-primary">Admin</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    @if($user->id != 1)
                                        <a href="{{ route('users.delete',['id'=>$user->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    @endif
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