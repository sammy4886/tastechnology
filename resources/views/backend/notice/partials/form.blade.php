<div class="row">
    <div class="col-md-12">
    <!-- @include('partials.errors') -->
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-head">
                <header>{!! $header !!}</header>
                <div class="tools visible-xs">
                    <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                        <i class="md md-arrow-back"></i>
                        Back
                    </a>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save Draft">
                    <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="Publish">
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::text('title',old('title'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('title','Title*') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::text('author',old('author'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('author','Author*') }}
                        </div>
                    </div>
                </div>
                {{--<div class="row">--}}
                {{--<div class="col-sm-12">--}}
                {{--<div class="form-group">--}}
                {{--{{ Form::date('date',old('date'),['class'=>'form-control', 'required']) }}--}}
                {{--{{ Form::label('date','Date*') }}--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::text('type',old('type'),['class'=>'form-control']) }}
                            {{ Form::label('type','type*') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::text('title',old('title'),['class'=>'form-control']) }}
                            {{ Form::label('title','title*') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::text('quote',old('quote'),['class'=>'form-control']) }}
                            {{ Form::label('quote','quote*') }}
                        </div>
                    </div>
                </div>
                {{--<div class="row">--}}
                {{--<div class="col-sm-12">--}}
                {{--<label class="text-default-light">Where do you want to publish this notice</label>--}}
                {{--{{ Form::select('imageSection',['PopUp News'=> 'PopUp News','Notice' => 'Notice','Auto loan' => 'Auto loan']) }}--}}
                {{--</div>--}}

                {{--</div>--}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::textarea('content',old('content'),['required', 'id' => 'my-editor']) }}
                            <p class="help-block">Content*</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="text-default-light">Where do you want to publish this notice</label>
                        {{ Form::select('imageSection',['PopUp News'=> 'PopUp News','Notice' => 'Notice']) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label class="text-default-light">Featured Image</label>
                        @if(isset($notice) && $notice->image)
                            <input type="file" name="image" class="dropify" data-default-file="{{ asset($notice->image->path) }}"/>
                        @else
                            <input type="file" name="image" class="dropify"/>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <button type="reset" class="btn btn-default ink-reaction">Reset</button>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save Draft">
                    <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="{{ isset($notice) && $notice->is_published ? 'Save' : 'Publish' }}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-affix affix-4">
            <div class="card-head">
                <div class="tools">
                    <a class="btn btn-default btn-ink" href="{{ route('notice.index') }}">
                        <i class="md md-arrow-back"></i>
                        Back
                    </a>
                </div>
            </div>
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <button type="reset" class="btn btn-default ink-reaction">Reset</button>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save Draft">
                    <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="{{ isset($notice) && $notice->is_published ? 'Save' : 'Publish' }}">
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('my-editor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
@endpush
