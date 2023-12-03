@extends('layouts.admin')

@section('content')

<h3>Lista tipi</h3>
<span class="text-warning">Clicca sul nome per modificarlo</span>
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
        <tr>
            <td>
                <form
                action="{{ route('admin.types.update', $type) }}"
                method="POST"
                class="d-inline-block"
                onsubmit="return confirm('Sei sicuro di voler modificare {{$type->name}}?')"
                id="form-edit-{{$type->id}}">
                <input type="text" value="{{$type->name}}" name="name" id="name" class="no-border">
                @csrf
                @method('PUT')
                </form>
            </td>
            <td>
                <button onclick="submitForm({{$type->id}})" type="submit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                <form
                class="d-inline-block"
                action="{{route('admin.types.destroy', $type->id)}}"
                method="POST"
                onsubmit="return confirm('Sei sicuro di voler eliminare {{$type->name}}?')"
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
        <h3>Inserisci un nuovo tipo</h3>
        <form action="{{route('admin.types.store')}}" method="POST">
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
        if(confirm('Sei sicuro di voler modificare questo tipo?')){
          form.submit();
        }

    }
  </script>

@endsection
