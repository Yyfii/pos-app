@extends('layouts.app')

@section('title', 'Fornecedores - MercadoBom')

@section('buttons')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="../css/create.css" rel="stylesheet">
<button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='{{ route('fornecedores.create') }}'">
    <i class='bx bx-folder-open'></i> Novo Fornecedor
</button>
<button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('fornecedores.index') }}'">
    <i class='bx bx-paste'></i> Fornecedores
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

        @if($fornecedores->isEmpty())
            <p class="text-center">Nenhum registro encontrado. <a href="{{ route('fornecedores.create') }}">Adicione um novo.</a></p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Data Criação</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <th scope="row">{{ $fornecedor->id_fornecedor }}</th>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td>{{ $fornecedor->cnpj }}</td>
                            <td>{{ $fornecedor->telefone }}</td>
                            <td>{{ $fornecedor->data_criacao }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('fornecedores.edit', $fornecedor->id_fornecedor) }}" class="btn btn-primary" role="button" style="height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class='bx bx-pencil'></i>
                                    </a>
                                    <form action="{{ route('fornecedores.destroy', $fornecedor->id_fornecedor) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="height: 50px; display: flex; align-items: center; justify-content: center;" disabled>
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
        {{ $fornecedores->links() }}
        </div>
    </div>
        @endif
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
