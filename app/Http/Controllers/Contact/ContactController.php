<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        $contactTypes = ContactType::all();
        return view('Interno.contact.contact', compact('contacts', 'contactTypes'));
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
        try{
            $contact = new Contact($request->all());
            $contact->save();
            return redirect(route('contato.index'))->with('success', 'Ae! Contato adicionado!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao adicionar contato...');
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
            $contact = Contact::findOrFail($id);
            $contact->update($request->all());
            return redirect(route('contato.index'))->with('success', 'Ae! Contato atualizado!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao atualizar contato...');
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
            Contact::destroy($id);
            return redirect(route('contato.index'))->with('success', 'Ae! Contato Excluído com sucesso!');
        }catch(\Exception $e){
        return redirect()->back()->with('error', 'Foi mal! Erro ao excluir esse Contato...');
        }
    }
}
