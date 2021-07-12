<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

        return view('site.contato',['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        $regras = [
            'nome'              => 'required|min:3|max:200|unique:site_contatos',
            'telefone'          => 'required',
            'email'             => 'email',
            'motivo_contatos_id'=> 'required',
            'mensagem'          => 'required|max:2000'
        ];
        
        $feedback = [
            'nome.min'          => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max'          => 'O campo nome deve ter no máximo 200 caracteres',
            'nome.unique'       => 'O nome informado já está em uso',
            
            'email.email'       => 'O e-mail informado não é valido',
            'mensagem.max'      => 'O campo mensagem deve ter no máximo 2000 caracteres.',
            'required'          => 'O campo :attribute deve ser preenchido'
        ];

        // Validação Request
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
