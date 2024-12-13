@extends('layouts.app')

@section('title', 'Fornecedores - MercadoBom')
@section('buttons')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="{{asset('../css/create.css')}}" rel="stylesheet">

<button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='{{ route('fornecedores.create') }}'">
    <i class='bx bx-folder-open'></i> Novo Fornecedor
</button>
<button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('fornecedores.index') }}'">
    <i class='bx bx-paste'></i> Fornecedores
</button>
<button type="button" class="btn btn-secondary btn-lg" disabled><i class='bx bx-edit'></i> Editar</button>
@endsection
@section('content')


<!-- Conteúdo dos produtos -->

  <div id="content">
         <!--Deveria ter as informações de quem está vendendo, hora, opção de cancelar venda-->
         <div class="container">
            <h1>Cadastrar Fornecedor</h1>
                <form action="{{route('fornecedores.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <label for="nome">Nome:</label>
                    <input class="nome" type="text" id="nome" name="nome" placeholder="Fornecedor A" required />

                    <label for="email">Email:</label>
                    <input class="nome" type="email" id="email" name="email" placeholder="|contato@fornecedora.com" required />

                    
                    <label  for="cnpj">CNPJ:</label>
                    <input class="nome cpfOuCnpj" type="tel" id="cnpj" name="cnpj" maxlength=14 placeholder="12345678000100" required />

                    <label  for="telefone">Telefone:</label>
                    <input class="nome" type="tel" id="telefone" name="telefone" maxlength=15 placeholder="11 987654321" required />
                    <div class="button-wrapper">
                        <input class="btn btn-primary" type="submit" value="Cadastrar Fornecedor" />
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
    </div>

<script href="{{asset('../js/mask.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
