<?php

namespace App\Http\Controllers;

use App\Category;
use App\Genero;
use http\Exception\BadQueryStringException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $rules = [
        'name' => 'required|max:190',
        'genero_id' => 'required'
    ];
    protected $attributes = [
        'name' => 'Nome',
        'genre_id' => 'Gênero'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesList = Category::all();
        foreach ($categoriesList as $category){
            $categories[] = $this->populateCategories($category);
        }

        return json_encode($categories);
    }

    protected function populateCategories($category)
    {
        $genero = Genero::where('id', $category->genero_id)
            ->take(1)
            ->get();
        $categoria = new \stdClass();
        $categoria->name = $category->name;
        $categoria->id = $category->id;
        $categoria->genre_id = $genero[0]->id;
        $categoria->genre = $genero[0]->name;

        return $categoria;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, $this->rules,['required' => 'O campo :attributes é obrigatório.',
            'max' => 'O nome :attributes é muito extenso.'
        ],$this->attributes);
        if ($category = Category::create($data)) {
            return $this->success("Dados salvos com sucesso!");
        }
        return $this->error("Ocorreu em erro ao salvar os dados");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
