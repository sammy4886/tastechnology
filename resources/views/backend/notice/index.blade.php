@extends('backend.layouts.app')

@section('title', 'Post')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all notice</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('notice.create') }}">
                            <i class="md md-add"></i>
                            Add Notice
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="10%" >Author</th>
                            <th width="5%">Published</th>
                            <th width="5%">Type</th>
                            <th width="15%">Title</th>
                            <th width="50%">Content</th>
                            <th width="50%">Quote</th>
                            <th width="20%">View</th>
                            <th width="1%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('backend.notice.partials.table', $notice, 'notice')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop