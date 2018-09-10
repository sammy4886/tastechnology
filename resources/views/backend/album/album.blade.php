@extends('backend.layouts.app')

@section('title', 'Album')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">All Albums</header>
                </div>
                <div class="card-body">
                    <div class="media">
                        <img class="media-object pull-left" alt="{{$album->name}}" src="/albums/{{$album->cover_image}}"
                             width="350px">
                        <div class="media-body">
                            <h2>{{$album->name}}</h2>
                            <div class="media">
                                <h4>{{$album->description}}</h4>
                                <p>
                                    <a href="{{route('album.add_image',array('id'=>$album->id))}}">
                                        <button type="button" class="btn btn-primary btn-large">Add New Image to Album
                                        </button>
                                    </a>
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($album->Photos as $photo)
                            <div class="col-lg-3">
                                <div class="thumbnail" style="max-height: 350px;min-height: 50px;">
                                    <img class="thumbnail" style="height: 200px;" alt="{{$album->name}}"
                                         src="/albums/{{$photo->image}}">
                                    <div class="caption">
                                        <p>{{$photo->description}}</p>
                                        <div class="col-md-6">
                                            <a href="{{URL::route('album.delete_image',array('id'=>$photo->id))}}"
                                               onclick="returnconfirm('Are you sure?')">
                                                <button type="button" class="btn btn-danger btn-small">Delete Image
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <form name="movephoto" method="POST"
                                                  action="{{URL::route('album.move_image')}}">
                                                {{ csrf_field() }}
                                                <select name="new_album">
                                                    @foreach($albums as $others)
                                                        <option value="{{$others->id}}">{{$others->name}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="photo" value="{{$photo->id}}"/>
                                                <button type="submit" class="btn btn-smallbtn-info"
                                                        onclick="return confirm('Are you sure?')">Move Image
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
