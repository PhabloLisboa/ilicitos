<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministracaoController extends Controller
{
    public function index()
    {
        switch(Auth::user()->sys_role_id){
            case 1:
                return view('Interno.adm.index');
            case 2:
                return ["alo" => "kkkk"];
            default:
                return ["tttt" => "kkkk"];
        }
    }
}
