@extends('layouts.app')

@section('title', 'Produtos - MercadoBom')
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
<!--Deveria ter as informações de quem está vendendo, hora, opção de cancelar venda-->
    <h1>Cadastrar Produto</h1>
    <form action="{{route('products.store') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="itens-form">
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02" name="foto_produto">
                <label class="input-group-text" for="inputGroupFile02">
                    @if ($product->foto)
                        <img style="width:40px; height:40px;" src="data:image/jpeg;base64,{{ $product->foto_base64 }}" alt="Imagem do Produto">
                    @else
                        <img style="width:40px; height:40px;" src="../asset/default-product.png" alt="Imagem do Produto">
                    @endif
                </label>
            </div>
                    <label  for="nome_produto">Nome do Produto:</label>
                    <input class="nome" type="text" id="nome_produto" name="nome_produto" placeholder="Digite aqui" value="{{old('nome_produto', $product->nome)}}" required />
                    @error('nome_produto')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <label  for="descricao_produto">Descrição: </label>
                    <input class="nome" type="text" id="descricao_produto" name="descricao_produto" placeholder="Digite aqui" value="{{old('descricao_produto', $product->descricao)}}" required />
                    @error('descricao')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="preco_produto">Preço do Produto:</label>
                    <input class="preco"
                    type="number"
                    id="preco_produto"
                    name="preco_produto"
                    step="0.01"
                    placeholder="0.0"
                    required
                    value="{{old('preco_produto', $product->preco)}}"
                    />
                    @error('preco_produto')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="qtd_produto">Quantidade em estoque:</label>
                    <input class="qtd" 
                    type="number"
                    id="qtd_produto"
                    name="qtd_produto"
                    min="0"
                    placeholder="0"
                    required
                    value="{{old('qtd_produto', $product->quantidade_em_estoque)}}"
                    />
                    @error('qtd_produto')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="categorias">
                    <label for="categoria">Categoria: </label>
                    <select name="categoria_id" class="select" id="categoria" required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $categoria->id == $product->id_categoria ? 'selected' : '' }}>
                                {{ $categoria->name }}
                            </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="fornecedores">
                    <label for="fornecedor">Fornecedor: </label>
                    <select name="fornecedor_id" id="fornecedor" class="select">
                        @foreach($fornecedores as $fornecedor)
                            <option value="{{ $fornecedor->id }}" {{ $fornecedor->id == $product->id_fornecedor ? 'selected' : '' }}>
                                {{ $fornecedor->name }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="button-wrapper">
                    <input class="btn btn-primary" type="submit" value="Cadastrar Produto" />
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
