<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label pull-left text-center">Post Name</label>
    <div class="col-md-8">
        <input id="name" type="text" class="form-control" name="name" value="{{ (isset($post->title)) ? $post->title : old('name') }}" autofocus>
        <br/>
        @if ($errors->has('name'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
    <label for="desc" class="col-md-4 control-label pull-left text-center">Post Content</label>

    <div class="col-md-8">
        <textarea name="desc" id="desc">{{(isset($post->content)) ? $post->content :old('desc')}}</textarea>
        <br/>
        @if ($errors->has('desc'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('desc') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label pull-left text-center">Post Status</label>

    <div class="col-md-8">
        <select name="status" class="form-control">
            <option value="1" {{ (isset($post->status) && $post->status == 1)? 'selected' : '' }}>Active</option>
            <option value="0" {{ (isset($post->status) && $post->status == 0)? 'selected' : '' }}>Not Active</option>
        </select>
        <br/>
        @if ($errors->has('status'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label pull-left text-center">Post Tags</label>
        <div class="col-md-8">
            @foreach($tags as $tag)
                <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                @if(isset($post->tags))
                            @foreach($post->tags as $t)
                                @if($t->id == $tag->id)
                                    checked
                                @endif
                            @endforeach
                        @endif
                > {{$tag->tag}} <br/>
            @endforeach
        </div>
    </div>
    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label for="image" class="col-md-4 control-label pull-left text-center">Post Category</label>
        <div class="col-md-8">
            <select name="type" class="form-control">
                @foreach($cats as $main)
                    <option value="{{$main->id}}"
                            {{ (isset($post->category_id) && $post->category_id == $main->id)? 'selected' : '' }}>
                        {{$main->name}}
                    </option>
                @endforeach
            </select>
            <br/>
        </div>
    </div>
    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label for="image" class="col-md-4 control-label pull-left text-center">Post Image</label>

        <div class="col-md-8">
            <input accept="image/*" onchange="preview_image(event)" type="file" class="form-control" name="featured">
            <br /><br/>
            @if(isset($post->featured))
                <img id="output_image" class="img-responsive img-thumbnail col-md-4" src="{{asset('uploads/'.$post->featured)}}" />
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