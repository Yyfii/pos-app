<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
          ]);
          Categoria::create($request->all());
          return redirect()->route('categorias.index')
            ->with('success', 'Categoria created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|max:100',
          ]);
          $categoria = Categoria::find($id);
          $categoria->update($request->all());
          return redirect()->route('categorias.index')
            ->with('success', 'Categoria updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categorias.index')
        ->with('success', 'Categoria deleted successfully');
    }

    public function create(){
        return view('categorias.create');
    }

    public function edit($id){
        $categoria = Categoria::find($id);
        return view('categorias.edit', compact('categorias'));
    }
}
