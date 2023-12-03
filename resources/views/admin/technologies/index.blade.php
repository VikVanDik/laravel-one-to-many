@extends('layouts.admin')

@section('content')

<h3>Lista tecnologie</h3>
<span class="text-warning">Clicca sul nome per modificarlo</span>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<table class="table my-5">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($technologies as $technology )
            <tr>
                <td>
                    <form
                    action="{{ route('admin.technologies.update', $technology) }}"
                    method="POST"
                    class="d-inline-block"
                    onsubmit="return confirm('Sei sicuro di voler modificare {{$technology->name}}?')"
                    id="form-edit-{{$technology->id}}">
                    <input type="text" value="{{$technology->name}}" name="name" id="name" class="no-border">
                    @csrf
                    @method('PUT')
                    </form>
                </td>
                <td>
                    <button onclick="submitForm({{$technology->id}})" type="submit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                    <form
                    class="d-inline-block"
                    action="{{route('admin.technologies.destroy', $technology->id)}}"
                    method="POST"
                    onsubmit="return confirm('Sei sicuro di voler eliminare {{$technology->name}}?')"
                    >
                    @csrf
                    @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>

<div class="my-5">
    <h3>Inserisci una nuova tecnologia</h3>
    <form action="{{route('admin.technologies.store')}}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>

        <button type="submit" class="btn btn-success">Crea</button>
        <button type="reset" class="btn btn-danger">Annulla</button>
      </form>
</div>

<script>
    function submitForm(id){
        const form = document.getElementById('form-edit-'+id);
        if(confirm('Sei sicuro di voler modificare questa tecnologia?')){
          form.submit();
        }

    }
</script>

@endsection
