@extends('home')
@section('content')

    @foreach($projects as $pj)
        Công việc thuộc <span class="badge bg-success"> {{ $projectsName->nameProject }} </span> hiện tại bao gồm:<br> - {{ $pj->taskName }}
    @endforeach

@endsection
