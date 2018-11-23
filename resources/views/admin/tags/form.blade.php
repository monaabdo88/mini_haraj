<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label pull-left text-center">Tag Name</label>
    <div class="col-md-8">
        <input id="name" type="text" class="form-control" name="tag" value="{{ (isset($tag->tag)) ? $tag->tag : old('tag') }}" autofocus>
        <br/>
        @if ($errors->has('tag'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('tag') }}</strong>
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