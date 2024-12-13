@extends('layouts.app')

@section('title', 'Listar Produtos - MercadoBom')
@section('buttons')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="../css/create.css" rel="stylesheet">

<button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='{{ route('products.create') }}'">
    <i class='bx bx-folder-open'></i> Novo produto
</button>
<button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('products.index') }}'">
    <i class='bx bx-paste'></i> Produtos
</button>
<button type="button" class="btn btn-secondary btn-lg" disabled><i class='bx bx-edit'></i> Editar</button>
@endsection
@section('content')
<!-- Conteúdo dos produtos -->

<div id="content">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($products->isEmpty())
        <p class="text-center">Nenhum produto encontrado. <a href="{{ route('products.create') }}">Adicione um novo.</a></p>
    @else
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
            <th scope="row">{{ $product->id_produto }}</th>
            <td style="margin-top: 5px;">
              @if ($product->foto)
                    <img src="{{ asset('storage/' . $product->foto) }}" alt="Imagem do Produto" style="width:40px; height:40px;">
              @else
                  <img src="https://www.lyfemarketing.com/blog/wp-content/uploads/2022/05/5-Clean.jpg" alt="Imagem Padrão" style="width:40px; height:40px;">
              @endif
            </td>
            <td>{{$product-> nome}}</td>
            <td>{{$product-> preco}}</td>
            <td>{{$product-> quantidade_em_estoque}}</td>
            <td>{{ $product->categoria ? $product->categoria->nome : 'N/A' }}</td>
            <td>{{ $product->fornecedor ? $product->fornecedor->nome : 'N/A' }}</td>
            <td>{{$product-> data_criacao}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <!-- Link com botão de edição -->
                  <a href="{{ route('products.edit', $product->id_produto) }}" class="btn btn-primary" role="button" style="height: 50px; display: flex; align-items: center; justify-content: center;">
                      <i class='bx bx-pencil'></i>
                  </a>

                  <!-- Formulário com botão de excluir -->
                  <form action="{{ route('products.destroy', $product->id_produto) }}" method="POST" style="display: inline-block;">
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
    <div class="d-flex">
    <div class="mx-auto">
    {{ $products->links() }}
    </div>
</div>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
