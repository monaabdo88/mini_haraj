 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label pull-left text-center">Name</label>

        <div class="col-md-8">
            <input id="name" type="text" class="form-control" name="name" value="{{ (isset($user->name)) ? $user->name :old('name') }}" required autofocus>
            <br/>
            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label pull-left text-center">E-Mail Address</label>

        <div class="col-md-8">
            <input id="email" type="email" class="form-control" name="email" value="{{ (isset($user->email)) ? $user->email :old('email') }}" required>
            <br/>
            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label pull-left text-center">Password</label>

        <div class="col-md-8">
            <input id="password" type="password" class="form-control" name="password" required>
            <br/>
            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label pull-left text-center">Confirm Password</label>

        <div class="col-md-8">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            <br/>
        </div>
    </div>
 @if(@$user->id != 1)
     <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
         <label for="name" class="col-md-4 control-label pull-left text-center">Permission</label>

         <div class="col-md-8">
             <select name="admin" class="form-control">
                 <option value="1" {{ (isset($user->admin) && $user->admin == 1)? 'selected' : '' }}>Admin</option>
                 <option value="0" {{ (isset($user->admin) && $user->admin == 0)? 'selected' : '' }}>User</option>
             </select>
             <br/>
             @if ($errors->has('admin'))
                 <span class="help-block text-danger">
                    <strong>{{ $errors->first('admin') }}</strong>
                </span>
             @endif
         </div>
     </div>
 @endif
 @section('script')
        <script>
            CKEDITOR.replace( 'about' );
        </script>
        @if (count($errors) > 0)
            @foreach($errors->all() as $error)
                <script>
                    toastr.error('{{$error}}');
                </script>
@endforeach
@endif
@endsection