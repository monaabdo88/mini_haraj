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
<div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
    <label for="desc" class="col-md-4 control-label pull-left text-center">Category Description</label>

    <div class="col-md-8">
        <textarea name="desc" id="desc">{{(isset($cat->desc)) ? $cat->desc :old('desc')}}</textarea>
        <br/>
        @if ($errors->has('desc'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('desc') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
    <label for="tags" class="col-md-4 control-label pull-left text-center">Category Tags</label>

    <div class="col-md-8">
        <textarea name="tags" id="tags">{{(isset($cat->tags)) ? $cat->tags :old('tags')}}</textarea>
        <br/>
        @if ($errors->has('tags'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('tags') }}</strong>
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
    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="image" class="col-md-4 control-label pull-left text-center">Category Image</label>

    <div class="col-md-8">
        <input accept="image/*" onchange="preview_image(event)" type="file" name="cat_img">
        <br /><br/>
        @if(isset($cat->image))
            <img id="output_image" class="img-responsive img-thumbnail col-md-4" src="{{asset('uploads/'.$cat->image)}}" />
        @else
            <img id="output_image" class="img-responsive col-md-4 pull-right" />
        @endif
        <br/><br/>
        @if ($errors->has('image'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif

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