@extends('backend.layouts.app')

@section('title', 'Team')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($team, ['route' =>['team.update', $team->id],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.team.partials.form', ['header' => 'Edit team <span class="text-primary">('.str_limit($team->name, 47).')</span> <'])
            {{ Form::close() }}
        </div>
    </section>

@endsection

@push('styles')
    <link href="{{ asset('backend/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/dropify/dropify.min.js') }}"></script>
@endpush