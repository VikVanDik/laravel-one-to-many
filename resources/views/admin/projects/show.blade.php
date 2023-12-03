@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            <h1>{{$project->name}}</h1>
            <span class="text-danger fs-6">Creato il: {{$project->creation}}</span>
        </div>

        <div>
            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
            <form
                class="d-inline-block"
                action="{{route('admin.projects.destroy', $project->id)}}"
                method="POST"
                onsubmit="return confirm('Sei sicuro di voler eliminare?')">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <div class="d-flex mt-5">
        <p class="me-5"><b>Creato in:</b> {{$project->technology}}</p>
        @if ($project->type)
        <div>
            <p><strong>Progetto di tipo:</strong> {{$project->type->name}}</p>
        </div>
        @endif
    </div>

    <p>{{$project->description}}</p>
    <p>Clicca qui per vederlo su Github: <a href="{{$project->url}}">{{$project->url}}</a></p>

</div>

@endsection
