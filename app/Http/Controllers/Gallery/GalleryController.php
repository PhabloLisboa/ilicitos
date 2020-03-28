<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::paginate(5);
        return view('Interno.gallery.gallery', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Interno.gallery.create');

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
            $gallery = Gallery::create($request);
            Image::createGallery($request, 'fotos', $gallery->id);
            return redirect(route('galeria.index'))->with('success', 'Ae! Galeria adicionada!');
        }catch(\Exception $e){
        return redirect()->back()->with('error',   'Foi mal! Erro ao criar essa notícia...(Não podemos ter nomes iguais em galeria) Aceito apenas: jpeg, jpg, png.');
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
        $gallery = Gallery::findOrFail($id);
        return view('Interno.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $gallery = Gallery::findOrFail($id);
            $gallery->update($request->all());

            return redirect()->back()->with('success', 'Ae! Galeria atualizada!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao atualizar essa Galeria...');
        }
    }

    public function add(Request $request, $id){
        try{

            Image::createGallery($request, 'fotos', $id);
            return redirect()->back()->with('success', 'Ae! Galeria atualizada!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao adicionar essa(s) Imagens...');
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
        //
    }
}
