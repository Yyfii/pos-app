<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categoria;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carrega os produtos junto com as informações das tabelas relacionadas
        $products = Product::with(['categoria', 'fornecedor'])->paginate(10);

        // Verifica se há uma foto e, caso haja, converte para base64
        foreach ($products as $product) {
            if ($product->foto) {
                $product->foto_base64 = base64_encode($product->foto);
            }
        }

        return view('products.index', compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'foto_produto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome_produto' => 'required|max:100',
            'descricao_produto' => 'nullable|max:255',
            'preco_produto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'qtd_produto' => 'required|integer|min:0',
            'categoria_id' => 'required|integer',
            'fornecedor_id' => 'required|integer',
        ], [
            'foto_produto.image' => 'A foto precisa ser uma imagem válida.',
            'preco_produto.regex' => 'O preço deve ser um número válido (exemplo: 10.50).',
            'qtd_produto.integer' => 'A quantidade deve ser um número inteiro.',
            // Adicione outras mensagens personalizadas conforme necessário
        ]);
        
    // Preparar os dados para salvar no banco
    $data = [
        'nome' => $request->input('nome_produto'),
        'descricao' => $request->input('descricao_produto'),
        'preco' => $request->input('preco_produto'),
        'quantidade_em_estoque' => $request->input('qtd_produto'),
        'id_categoria' => $request->input('categoria_id'),
        'id_fornecedor' => $request->input('fornecedor_id'),
        'data_criacao' => now(), // Preenche o campo data_criacao com a data atual
    ];

    // Processar a foto, se existir
    if ($request->hasFile('foto_produto')) {
        $data['foto'] = $request->file('foto_produto')->store('images', 'public');
    }

    // Criar o produto
    Product::create($data);

    // Redirecionar com sucesso
    return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'foto_produto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome_produto' => 'required|max:100',
            'descricao_produto' => 'nullable|max:255',
            'preco_produto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'qtd_produto' => 'required|integer|min:0',
            'categoria_id' => 'required|integer',
            'fornecedor_id' => 'required|integer',
        ], [
            'foto_produto.image' => 'A foto precisa ser uma imagem válida.',
            'preco_produto.regex' => 'O preço deve ser um número válido (exemplo: 10.50).',
            'qtd_produto.integer' => 'A quantidade deve ser um número inteiro.',
            // Adicione outras mensagens personalizadas conforme necessário
        ]);
        
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produto não encontrado.');
        }

        // Handle file upload if exists
        if ($request->hasFile('foto_produto')) {
            $foto_produto = $request->file('foto_produto');
            $foto_path = $foto_produto->store('public/products');
            $request->merge(['foto' => $foto_path]);
        }

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produto não encontrado.');
        }

        // Delete the image file if exists
        if ($product->foto) {
            Storage::delete($product->foto);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto deletado com sucesso!');
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $fornecedores = Fornecedor::all();
        return view('products.create', compact('categorias', 'fornecedores'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produto não encontrado.');
        }

        $image = $product->foto ? base64_encode($product->foto) : null;
        return view('products.show', compact('product', 'image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with(['categoria', 'fornecedor'])->findOrFail($id);
        $categorias = Categoria::all();
        $fornecedores = Fornecedor::all();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produto não encontrado.');
        }

         return view('products.edit', compact('product', 'categorias', 'fornecedores'));
    }
}
