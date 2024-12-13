<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{

    public function index()
    {
        $fornecedores = Fornecedor::paginate(10);
        return view('fornecedores.index', compact('fornecedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|unique:Fornecedores,email|max:50',
            'cnpj' => 'required|unique:Fornecedores,cnpj|max:14',
            'telefone' => 'required|max:15',
        ], [
            'cnpj.unique' => ' Cnpj já está registrado.',
            'email.unique' => ' Email já está registrado.',
            // Adicione outras mensagens personalizadas conforme necessário
        ]);
          Fornecedor::create($request->all());
          return redirect()->route('fornecedores.index')
            ->with('success','Fornecedor criado com sucesso!');
    }    
    
    public function edit(string $id)
    {
      $fornecedor = Fornecedor::find($id);
      return view('fornecedores.edit', compact('fornecedor'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|max:50',
            'cnpj' => 'required|unique|max:20',
            'telefone' => 'required|max:20',
          ]);
          $fornecedor = Fornecedor::find($id);
          $fornecedor->update($request->all());
          return redirect()->route('fornecedores.index')
            ->with('success', 'Fornecedor editado com sucesso!');
    }    
    
    public function destroy(string $id)
    {
        return redirect()->route('fornecedores.index')
        ->with('Não permitido', 'Você não pode deletar esse fornecedor, pois isso deletaria todos os produtos relacionados a ele.');
    }

    public function create()
    {
        return view('fornecedores.create');
    }

    public function show(string $id)
    {
        $fornecedor = Fornecedor::find($id);
        return view('fornecedores.show', compact('fornecedor'));
    }



}
