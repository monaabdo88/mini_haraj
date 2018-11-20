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
                            <div class="form-group{{ $errors->has('site_facebook') ? ' has-error' : '' }}">
                                <label for="site_facebook" class="col-md-4 control-label pull-left text-center">Site Facebook Link</label>

                                <div class="col-md-8">
                                    <input id="site_facebook" type="text" class="form-control" name="site_facebook" value="{{ ($settings->site_facebook) ? $settings->site_facebook : old('site_facebook') }}" autofocus>
                                    <br/>
                                    @if ($errors->has('site_facebook'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_facebook') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_twitter') ? ' has-error' : '' }}">
                                <label for="site_twitter" class="col-md-4 control-label pull-left text-center">Site Twitter Link</label>

                                <div class="col-md-8">
                                    <input id="site_twitter" type="text" class="form-control" name="site_twitter" value="{{ ($settings->site_twitter) ? $settings->site_twitter :old('site_twitter') }}" autofocus>
                                    <br/>
                                    @if ($errors->has('site_twitter'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_twitter') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_linkedin') ? ' has-error' : '' }}">
                                <label for="site_linkedin" class="col-md-4 control-label pull-left text-center">Site Linkedin Link</label>

                                <div class="col-md-8">
                                    <input id="site_linkedin" type="text" class="form-control" name="site_linkedin" value="{{ ($settings->site_linkedin) ? $settings->site_linkedin :old('site_linkedin') }}" autofocus>
                                    <br/>
                                    @if ($errors->has('site_linkedin'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_linkedin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_git') ? ' has-error' : '' }}">
                                <label for="site_git" class="col-md-4 control-label pull-left text-center">Site GitHub Link</label>

                                <div class="col-md-8">
                                    <input id="site_git" type="text" class="form-control" name="site_git" value="{{ ($settings->site_git) ? $settings->site_git :old('site_git') }}" autofocus>
                                    <br/>
                                    @if ($errors->has('site_git'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_git') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_desc') ? ' has-error' : '' }}">
                                <label for="site_desc" class="col-md-4 control-label pull-left text-center">Site Description</label>

                                <div class="col-md-8">
                                    <textarea name="site_desc" id="site_desc">{{($settings->site_desc) ? $settings->site_desc :old('site_desc')}}</textarea>
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
                                    <textarea name="site_tags" id="site_tags">{{($settings->site_tags) ? $settings->site_tags :old('site_tags')}}</textarea>
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
                            <div class="form-group{{ $errors->has('site_copyright') ? ' has-error' : '' }}">
                                <label for="site_copyright" class="col-md-4 control-label pull-left text-center">Site Copyrights</label>

                                <div class="col-md-8">
                                    <textarea name="site_copyright" id="site_copyright">{{($settings->site_copyright) ? $settings->site_copyright :old('site_copyright')}}</textarea>
                                    <br/>
                                    @if ($errors->has('site_copyright'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_copyright') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('site_logo') ? ' has-error' : '' }}">
                                <label for="site_logo" class="col-md-4 control-label pull-left text-center">Site Logo Image</label>

                                <div class="col-md-8">
                                    <input id="site_logo" accept="image/*" onchange="preview_image(event)" type="file" name="site_logo">
                                    <br /><br/>
                                    <img id="output_image" class="img-responsive img-thumbnail col-md-4" src="{{asset('uploads/'.$settings->site_logo)}}" />

                                    <br/><br/>
                                    @if ($errors->has('site_logo'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('site_logo') }}</strong>
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