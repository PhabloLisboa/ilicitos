<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUser;
use App\Models\Image;
use App\Models\Person;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($hash)
    {
        $person = Person::getPersonByHash($hash);
        return view('Externo.user.create', compact('person'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'same'    => 'As senhas não conferem!',
            'size'    => 'Precisamos de uma senha maior que :size.!',
            'required' => 'Você não preencheu esse campo!',
            'email'      => 'Esse email não é válido!',
        ];

        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:4',
                'confirmPass' => 'required|same:password'
            ], $messages
        );

        try{
            if(User::verifyEmail($request->email)){
                throw new Exception("Alguém já está utilizando esse amil");
            }

            $request->person = Person::getPersonByHash($request->hash);

            $user = User::create($request);

            return redirect(route('login'))->with('success', 'Ok! Agora é só fazer o login');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao criar teu login...');

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
        $user = User::findOrFail($id);

        if ($id == Auth::user()->id)
            return view('Interno.user.edit', compact('user'));

        return redirect()->back();
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
            $user = User::findOrFail($id);
            $user->update($request->all());
            return redirect()->back()->with('success', 'Ae! Peça atualizada!');
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
        //
    }
}
