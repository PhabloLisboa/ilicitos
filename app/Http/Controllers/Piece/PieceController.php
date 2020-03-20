<?php

namespace App\Http\Controllers\Piece;

use App\Http\Controllers\Controller;
use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieces =  Piece::all();
        return view('Interno.piece.piece', compact('pieces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Interno.piece.create');
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
            Piece::create($request);
            return redirect(route('pecas.index'))->with('success', 'Ae! Peça Adicionada!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao adicionar essa Peça...');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            $piece = Piece::findOrFail($id);
            $piece->update($request->all());

            $piece->cover = $request->cover;
            $piece->save();

            return redirect(route('pecas.index', $id))->with('success', 'Ae! Peça atualizada!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao atualizar essa Peça...');
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
            Piece::destroy($id);
            return redirect(route('pecas.index'))->with('success', 'Ae! Peça Excluída com sucesso!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao excluir essa Peça...');
        }
    }
}
