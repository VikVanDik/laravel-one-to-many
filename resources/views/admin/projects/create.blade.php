@extends('layouts.admin')

@section('content')

<h1 class="">{{$title}}</h1>
@if($errors->any())
        <div class="alert alert-danger" role="alert" >
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
@endif
<form action="{{$route}}" method="POST" class="my-5">
    @csrf
    @method($method)


    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input
      type="text"
      class="@error('name') is-invalid @enderror form-control"
      id="name"
      name="name"
      value="{{old('name', $project?->name)}}">
    </div>
    @error('name')
        <p class="text-danger">Il nome è un campo obbligatorio</p>
    @enderror


    <div class="mb-3">
      <label for="creation" class="form-label">Data di creazione</label>
      <input
      type="date"
      class="@error('creation') is-invalid @enderror form-control"
      id="creation"
      name="creation"
      value="{{old('name', $project?->date)}}">
    </div>
    @error('creation')
    <p class="text-danger">La data di creazione è un campo obbligatorio</p>
    @enderror

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
        class="@error('url') is-invalid @enderror form-control"
        id="url"
        name="url"
        value="{{old('name', $project?->url)}}">
    </div>
    @error('name')
    <p class="text-danger">L'URL è un campo obbligatorio</p>
    @enderror

    <div class="mb-3">
        <label for="image">Immagine</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    {{-- <div class="mb-3">
        <label for="technology" class="form-label">Tecnologia</label>
        <input
        type="text"
        class="form-control @error('technology') is-invalid @enderror"
        id="technology"
        name="technology"
        value="{{old('name', $project?->technology)}}">
    </div>
    @error('technology')
    <p class="text-danger">La tecnologia è un campo obbligatorio</p>
    @enderror --}}

    <div class="btn-group mb-3" role="group" aria-label="Basic checkbox toggle button group">
        @foreach ($technologies as $technology)
            <input type="checkbox" class="btn-check" id="technology_{{$technology->id}}" autocomplete="off" name="technologies[]" value="{{$technology->id}}">
            <label class="btn btn-outline-primary" for="technology_{{$technology->id}}">{{ $technology->name }}</label>

        @endforeach
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
