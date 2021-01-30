<?php

namespace App\Http\Controllers;

use App\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    protected $rules = [
        'name' => 'required|max:190'
    ];
    protected $attributes = [
        'name' => 'Nome'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Genero::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if ($category = Genero::create($data)) {
            return $this->success("Dados salvos com sucesso!");
        }
        return $this->error("Ocorreu em erro ao salvar os dados");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        return $genero;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(Genero $genero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genero $genero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        //
    }
}
