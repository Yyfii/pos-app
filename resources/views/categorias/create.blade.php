@extends('layouts.app')

@section('title', 'Categorias - MercadoBom')
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
         <!--Deveria ter as informações de quem está vendendo, hora, opção de cancelar venda-->
            <h1>Cadastrar categoria</h1>
                <form action="{{route('categorias.store') }}" method="POST">
                @csrf
                <div class="itens-form">
                    <label  for="nome">Nome categoria: </label>
                    <input class="nome" type="text" id="nome" name="nome" placeholder="Digite aqui" required />

                    <div class="button-wrapper">
                    <input class="btn btn-primary" type="submit" value="Criar Categoria" />
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
</di>
                </form>
        </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
