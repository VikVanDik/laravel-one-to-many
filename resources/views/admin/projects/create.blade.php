@extends('layouts.admin')

@section('content')

<h1 class="">{{$title}}</h1>

<form action="{{$route}}" method="POST" class="my-5">
    @csrf
    @method($method)

    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input
      type="text"
      class="form-control"
      id="name"
      name="name"
      value="{{old('name', $project?->name)}}">
    </div>
    <div class="mb-3">
      <label for="creation" class="form-label">Data di creazione</label>
      <input
      type="date"
      class="form-control"
      id="creation"
      name="creation"
      value="{{old('name', $project?->date)}}">
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Tipo</label>
        <select class="form-select" aria-label="Default select example" name="type" id="type">
            @foreach ($types as $type)
                <option value="{{$type->id}}" {{old('type_id', $project?->type) == $type->id? 'selected' : ''}}>{{$type->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="url" class="form-label">URL</label>
        <input
        type="text"
        class="form-control"
        id="url"
        name="url"
        value="{{old('name', $project?->url)}}">
    </div>
    <div class="mb-3">
        <label for="technology" class="form-label">Tecnologia</label>
        <input
        type="text"
        class="form-control"
        id="technology"
        name="technology"
        value="{{old('name', $project?->technology)}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <input
        type="text"
        class="form-control"
        id="description"
        name="description"
        value="{{old('name', $project?->description)}}">
    </div>

    <button type="submit" class="btn btn-success">{{$button}}</button>
    <button type="reset" class="btn btn-danger">Annulla</button>
  </form>


@endsection
