@extends('layouts.app')

@section('title', 'Editar Produto - MercadoBom')
@section('buttons')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="{{asset('../css/create.css')}}" rel="stylesheet">

<button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='{{ route('products.create') }}'">
    <i class='bx bx-folder-open'></i> Novo produto
</button>
<button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('products.index') }}'">
    <i class='bx bx-paste'></i> Produtos
</button>
<button type="button" class="btn btn-secondary btn-lg" disabled><i class='bx bx-edit'></i> Editar</button>
@endsection
@section('content')

<div id="content">
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif
    <h1>Editar Produto</h1>
    
    <form action="{{route('products.update', $product->id_produto )}}" method="POST">
        @method('PUT')
        @csrf
        <div class="itens-form">
        <!-- Imagem do Produto -->
        <div class="input-group mb-3">
            <div class="card" style="width: 18rem;">
                @if ($product && $product->foto)
                    <img src="{{ asset('storage/' . $product->foto) }}" class="card-img-top" alt="Imagem do Produto">
                @else
                    <img src="{{ asset('default-product.png') }}" class="card-img-top" alt="Imagem do Produto">
                @endif

                <div class="card-body">
                    <input type="file" class="form-control mt-2" id="inputGroupFile02" name="foto_produto" accept="image/*">
                </div>
            </div>
        </div>

        <!-- Nome do Produto -->
        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" class="nome" id="nome_produto" name="nome_produto" placeholder="Digite aqui" value="{{ old('nome_produto', $product->nome ?? '') }}" required />
        @error('nome_produto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Descrição do Produto -->
        <label for="descricao_produto">Descrição</label>
        <input type="text" class="nome" id="descricao_produto" name="descricao_produto" placeholder="Digite aqui" value="{{ old('descricao_produto', $product->descricao ?? '') }}" />
        @error('descricao_produto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Preço do Produto -->
        <label for="preco_produto">Preço</label>
        <input class="preco" type="number" id="preco_produto" name="preco_produto" step="0.01" placeholder="0.00" value="{{ old('preco_produto', $product->preco ?? '') }}" />
        @error('preco_produto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Quantidade em Estoque -->
        <label for="qtd_produto">Quantidade</label>
        <input type="number" class="qtd" id="qtd_produto" name="qtd_produto" min="0" placeholder="0" value="{{ old('qtd_produto', $product->quantidade_em_estoque ?? '') }}" />
        @error('qtd_produto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="categorias">
    <label for="categoria" class="form-label">Categoria</label>
    <select class="form-select" name="categoria_id" id="categoria" required>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id_categoria }}" {{ $categoria->id_categoria == $product->id_categoria ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>
    @error('categoria_id')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="fornecedores">
    <label for="fornecedor" class="form-label">Fornecedor</label>
    <select class="form-select" name="fornecedor_id" id="fornecedor">
        @foreach ($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id_fornecedor }}" {{ $fornecedor->id_fornecedor == $product->id_fornecedor ? 'selected' : '' }}>
                {{ $fornecedor->nome }}
            </option>
        @endforeach
    </select>
    @error('fornecedor_id')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>

        <div class="button-wrapper">
            <input class="btn btn-primary" type="submit" value="Salvar mudanças" />
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
