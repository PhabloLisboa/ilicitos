<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
       return view('Interno.news.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Interno.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            News::create($request);
            return redirect(route('noticias.index'))->with('success', 'Ae! Notícia adicionada!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao criar essa notícia...');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('Interno.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('Interno.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try{
            $news = News::findOrFail($id);
            $news->update($request->all());
            return redirect(route('noticias.show', $id))->with('success', 'Ae! Notícia atualizada!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao atualizar essa notícia...');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try{
            News::destroy($id);
            return redirect(route('noticias.index'))->with('success', 'Ae! Notícia Excluída com sucesso!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao atualizar essa notícia...');
        }

    }
}
