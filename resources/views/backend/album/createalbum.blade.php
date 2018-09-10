@extends('backend.layouts.app')

@section('title', 'Page')

@section('content')
  <section>
        <div class="section-body">
                  <!-- Create Album Form -->

                {{ Form::open(['route' =>'album.createalbum','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
                      @include('backend.album.partials.form', ['header' => 'Create New Album'])
                      {{ Form::close() }} 


        </div>
  </section>
@stop
@push('scripts')
<script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush