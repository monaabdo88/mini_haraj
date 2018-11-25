@extends('admin.layouts.app')
@section('title')
    Site Settings
    @endsection
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ url('admin/settings/edit') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group{{ $errors->has('site_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label pull-left text-center">Site Name</label>

                                <div class="col-md-8">
                                    <input id="site_name" type="text" class="form-control" name="site_name" value="{{ ($settings->site_name) ? $settings->site_name : old('site_name') }}" autofocus>
                                    <br/>
                                    @if ($errors->has('site_name'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_mail') ? ' has-error' : '' }}">
                                <label for="site_mail" class="col-md-4 control-label pull-left text-center">Site E-mail</label>

                                <div class="col-md-8">
                                    <input id="site_mail" type="email" class="form-control" name="site_mail" value="{{ ($settings->site_mail) ? $settings->site_mail :old('site_mail') }}" autofocus>
                                    <br/>
                                    @if ($errors->has('site_mail'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_mail') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_phone') ? ' has-error' : '' }}">
                                <label for="site_phone" class="col-md-4 control-label pull-left text-center">Site Phone</label>

                                <div class="col-md-8">
                                    <input id="site_phone" type="text" class="form-control" name="site_phone" value="{{ ($settings->site_phone) ? $settings->site_phone :old('site_phone') }}" autofocus>
                                    <br/>
                                    @if ($errors->has('site_phone'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_address') ? ' has-error' : '' }}">
                                <label for="site_address" class="col-md-4 control-label pull-left text-center">Site Address</label>

                                <div class="col-md-8">
                                    <input id="site_address" type="text" class="form-control" name="site_address" value="{{ ($settings->site_address) ? $settings->site_address : old('site_address') }}" autofocus>
                                    <br/>
                                    @if ($errors->has('site_address'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_subaddress') ? ' has-error' : '' }}">
                                <label for="site_subaddress" class="col-md-4 control-label pull-left text-center">Site subAddress</label>

                                <div class="col-md-8">
                                    <input id="site_subaddress" type="text" class="form-control" name="site_subaddress" value="{{ ($settings->site_subaddress) ? $settings->site_subaddress :old('site_subaddress') }}" autofocus>
                                    <br/>
                                    @if ($errors->has('site_subaddress'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_subaddress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_desc') ? ' has-error' : '' }}">
                                <label for="site_desc" class="col-md-4 control-label pull-left text-center">Site Description</label>

                                <div class="col-md-8">
                                    <textarea name="site_desc" class="form-control" id="site_desc" rows="8">{{($settings->site_desc) ? $settings->site_desc :old('site_desc')}}</textarea>
                                    <br/>
                                    @if ($errors->has('site_desc'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_desc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_tags') ? ' has-error' : '' }}">
                                <label for="site_tags" class="col-md-4 control-label pull-left text-center">Site Tags</label>

                                <div class="col-md-8">
                                    <textarea name="site_tags" class="form-control" id="site_tags" rows="8">{{($settings->site_tags) ? $settings->site_tags :old('site_tags')}}</textarea>
                                    <br/>
                                    @if ($errors->has('site_tags'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_tags') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_status') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label pull-left text-center">Site Status</label>

                                <div class="col-md-8">
                                    <select name="site_status" class="form-control">
                                        <option value="open">Open</option>
                                        <option value="close">Close</option>
                                    </select>
                                    <br/>
                                    @if ($errors->has('site_status'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_close') ? ' has-error' : '' }}">
                                <label for="site_close" class="col-md-4 control-label pull-left text-center">Site Close Message</label>

                                <div class="col-md-8">
                                    <textarea name="site_close" id="site_close">{{($settings->site_close) ? $settings->site_close :old('site_close')}}</textarea>
                                    <br/>
                                    @if ($errors->has('site_close'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_close') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @if (count($errors) > 0)
        @foreach($errors->all() as $error)
            <script>
                toastr.error('{{$error}}');
            </script>
        @endforeach
    @endif
    @if(Session()->has('success'))
        <script>
            toastr.success('{{Session()->get('success')}}');
        </script>
    @endif
    @endsection