@extends('layouts.app')

@section('title', 'Listar Categorias - MercadoBom')
@section('buttons')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="../css/create.css" rel="stylesheet">

<button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='{{ route('categorias.create') }}'">
    <i class='bx bx-folder-open'></i> Nova categoria
</button>
<button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('categorias.index') }}'">
    <i class='bx bx-paste'></i> Categorias
</button>
<button type="button" class="btn btn-secondary btn-lg" disabled><i class='bx bx-edit'></i> Editar</button>
@endsection
@section('content')
<!-- Conteúdo dos produtos -->

<div id="content">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($categorias as $categoria)
        <tr>
            <th scope="row">{{ $categoria->id_categoria }}</th>
            <td>{{$categoria-> nome}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <!-- Link com botão de edição -->
                  <a href="{{ route('categorias.edit', $categoria->id_categoria) }}" class="btn btn-primary" role="button" style="height: 50px; display: flex; align-items: center; justify-content: center;">
                      <i class='bx bx-pencil'></i>
                  </a>

                  <!-- Formulário com botão de excluir -->
                  <form action="{{ route('categorias.destroy', $categoria->id_categoria) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" style="height: 50px; display: flex; align-items: center; justify-content: center;">
                          <i class='bx bx-trash'></i>
                      </button>
                  </form>
              </div>
            </td>

        </tr>
    @endforeach
    </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection