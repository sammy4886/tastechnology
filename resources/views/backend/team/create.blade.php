@extends('backend.layouts.app')

@section('title', 'Teams')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'team.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.team.partials.form', ['header' => 'Create a team'])
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
<script>
    var manualUploader = new qq.FineUploader({
        element: team.getElementById('fine-uploader-manual-trigger'),
        template: 'qq-template-manual-trigger',
        request: {
            endpoint: '/server/uploads'
        },
        thumbnails: {
            placeholders: {
                waitingPath: '/source/placeholders/waiting-generic.png',
                notAvailablePath: '/source/placeholders/not_available-generic.png'
            }
        },
        autoUpload: false,
        debug: true
    });

    qq(team.getElementById("trigger-upload")).attach("click", function() {
        manualUploader.uploadStoredFiles();
    });
</script>
@endpush