<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label pull-left text-center">Category Name</label>
    <div class="col-md-8">
        <input id="name" type="text" class="form-control" name="name" value="{{ (isset($cat->name)) ? $cat->name : old('name') }}" autofocus>
        <br/>
        @if ($errors->has('name'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label pull-left text-center">Category Status</label>

    <div class="col-md-8">
        <select name="status" class="form-control">
            <option value="1" {{ (isset($cat->status) && $cat->status == 1)? 'selected' : '' }}>Active</option>
            <option value="0" {{ (isset($cat->status) && $cat->status == 0)? 'selected' : '' }}>Not Active</option>
        </select>
        <br/>
        @if ($errors->has('status'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>
</div>
    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label for="image" class="col-md-4 control-label pull-left text-center">Category Type</label>
        <div class="col-md-8">
        <select name="type" class="form-control">
            <option value="0" {{ (isset($cat->type) && $cat->type == 0)? 'selected' : '' }}>Main Category</option>
            @foreach($main_cats as $main)
                <option value="{{$main->id}}" {{ (isset($cat->type) && $cat->type == $main->id)? 'selected' : '' }}>{{$main->name}}</option>
            @endforeach
        </select>
        <br/>
    </div>
    </div>

@section('script')
    <script>
        CKEDITOR.replace( 'tags' );
        CKEDITOR.replace( 'desc' );
    </script>
    @if (count($errors) > 0)
        @foreach($errors->all() as $error)
            <script>
                toastr.error('{{$error}}');
            </script>
        @endforeach
    @endif
    @endsection