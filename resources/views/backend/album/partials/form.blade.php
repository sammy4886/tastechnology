<div class="row">
    <div class="col-md-12">
        @include('partials.errors')
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-head">
                <header>{!! $header !!}</header>
                @if (isset($errors) && $errors->has(''))
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

                <form name="createnewalbum" method="POST" action="{{route('album.create_album')}}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="name"></label>
                            <input name="name" type="text" class="form-control" placeholder="Album Name"
                                   value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="description"></label>
                            <textarea name="description" type="text" class="form-control"
                                      placeholder="Album description">{{old('descrption')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cover_image"><b>Select a Cover Image</b></label>
                            <br>
                            {{Form::file('cover_image')}}
                        </div>
                        <a class="btn btn-default btn-ink" href="{{route('album.index')}}">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                        <button type="reset" class="btn btn-default ink-reaction">Reset</button>
                        <button type="submit" class="btn btn-info ink-reaction">Create!</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
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
                    <button type="submit" class="btn btn-info ink-reaction">Create!</button>
                </div>
            </div>
        </div>
    </div>