<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Role\RoleController as RoleFunctions;
use App\Http\Requests\StorePeopleTeam;
use App\Mail\CadastroMail;
use App\Models\Person;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TeamController extends Controller
{
    protected $status = 2; // Inativo

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allByRole = RoleFunctions::getAllUsesByRole();
        $roles = Role::all();
        return view('Interno.Team.team', compact('allByRole', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('Interno.Team.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeopleTeam $request)
    {

        try{
            if(User::verifyEmail($request->email))
                return redirect()->back()->with('error', 'Alguém já está usando esse e-mail!');


            $person = Person::create($request);

            Mail::to($request->email)->send(new CadastroMail($person->hash));

            return redirect(route('equipe.create'))->with('success',
                'Tudo Certo! Agora só esperar '.$person->name.' prosseguir!');

        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Falha ao adicionar esta pessoa...');
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
        $request->userId = $id;

        try {
            User::updateForTeam($request);

            return redirect()->back()->with('success',
                'Tudo Certo! Atualizado com Sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar! Tenha certeza que esse integrante já verificou o e-mail!');

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
            Person::destroy($id);
            return redirect()->back()->with('success', 'Integrante excluído com sucesso!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao excluir esse integrante...');
        }
    }
}
