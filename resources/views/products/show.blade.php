@extends('layouts.app')

@section('title', 'Listar Produtos - MercadoBom')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="../css/create.css" rel="stylesheet">

<button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='{{ route('products.create') }}'">
    <i class='bx bx-folder-open'></i> Novo produto
</button>
<button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('products.index') }}'">
    <i class='bx bx-paste'></i> Produtos
</button>
<button type="button" class="btn btn-secondary btn-lg" disabled><i class='bx bx-edit'></i> Editar</button>

<!-- Conteúdo dos produtos -->

<div id="content">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Foto</th>
        <th scope="col">Nome</th>
        <th scope="col">Preco</th>
        <th scope="col">Qtd.</th>
        <th scope="col">Categoria</th>
        <th scope="col">Fornecedor</th>
        <th scope="col">Data Criac.</th>
        <th scope="col">..</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
        <th scope="row">{{$product-> id_produto}}</th>
        <td style="margin-top: 5px;">
            @if ($product->foto)
                    <img style="width:40px; height:40px;" src="data:image/jpeg;base64,{{ $product->foto_base64 }}" class="card-img-top" alt="Imagem do Produto">
            @else
                <img style="width:40px; height: 40px;" src="https://www.lyfemarketing.com/blog/wp-content/uploads/2022/05/5-Clean.jpg" class="card-img-top" alt="...">
            @endif
        </td>
        <td>{{$product-> nome}}</td>
        <td>{{$product-> descricao}}</td>
        <td>{{$product-> preco}}</td>
        <td>{{$product-> quantidade_em_estoque}}</td>
        <td>{{$product-> id_categoria}}</td>
        <td>{{$product-> id_fornecedor}}</td>
        <td>{{$product-> data_criacao}}</td>
        <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="button" class="btn btn-primary" href="{{ route('products.edit') }}"><i class='bx bx-pencil' ></i></button>
            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class='bx bx-trash' ></i></button>
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
