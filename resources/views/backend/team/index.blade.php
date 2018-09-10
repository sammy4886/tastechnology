@extends('backend.layouts.app')

@section('title', 'Team')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all team</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('team.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="30%">Name</th>
                            <th width="30%">Designation</th>
                            <th width="20%" class="text-center">Published</th>
                            <th width="15%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($teams->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">No data available.</td>
                            </tr>
                        @else
                            @each('backend.team.partials.table', $teams, 'teams')
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection