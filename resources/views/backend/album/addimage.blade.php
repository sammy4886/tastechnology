@extends('backend.layouts.app')

@section('title', 'Album')

@section('content')
    <section>
        <div class="col-sm-8">
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all album</header>
                </div>
                <div class="card-body">
                    <div class="span4">
                        @if(isset($errors) && $errors->has(''))
                            <div class="alert alert-block alert-error fade in" id="error-block">
                                <?php
                                $messages = $errors->all('<li>:message</li>');
                                ?>
                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <h4>Warning!</h4>
                                <ul>
                                    @foreach($messages as $message)
                                        {{$message}}
                                    @endforeach

                                </ul>
                            </div>
                        @endif
                        <form name="addimagetoalbum" method="POST" action="{{URL::route('album.add_image_to_album')}}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="album_id" value="{{$album->id}}"/>
                            <fieldset>
                                <legend>Add an Image to {{$album->name}}</legend>
                                <div class="form-group">
                                    <label for="description">Image Description</label>
                                    <textarea name="description" type="text"
                                              class="form-control">{{$album->name}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Select an Image</label>
                                    {{--              {{Form::file('image')}}--}}
                                    <input type="file" name="cover_image[]" multiple>

                                {{Form::label('photos','Photos')}}
                                <!-- <input type="file" name="imageAlbum"> -->
                                </div>
                                <button type="submit" class="btn btn-info ink-reaction">Add Image!</button>
                            </fieldset>
                        </form>
                    </div>
                    @push('scripts')
                        <script>
                            var form = document.getAnonymousElementByAttribute()
                        </script>
                    @endpush
                </div>
            </div>
        </div>
        </div>
    </section>
     <div class="col-sm-4">
        <div class="card card-affix affix-4">
            <div class="card-head">
                <div class="tools">
                    <a class="btn btn-default btn-ink" href="{{route('album.index')}}">
                        <i class="md md-arrow-back"></i>
                        Back
                    </a>
                </div>
            </div>
            {{ Form::hidden('view', old('view')) }}
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <button type="reset" class="btn btn-default ink-reaction">Reset</button>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save Draft">
                    <button type="submit" class="btn btn-info ink-reaction">Add Image!</button>
                </div>
            </div>
        </div>
    </div>

@endsection
