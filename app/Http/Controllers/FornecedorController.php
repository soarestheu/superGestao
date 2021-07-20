<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        // dd($request->all());
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->nome.'%')
                                    ->where('site', 'like', '%'.$request->site.'%')
                                    ->where('uf', 'like', '%'.$request->uf.'%')
                                    ->where('email', 'like', '%'.$request->email.'%')
                                    ->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request){

        $msg ='';

        if($request->input('_token') != ""){
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchicdo corretamente'
            ];
           
            $request->validate($regras, $feedback);

            // echo "Chegamos até aqui";

            Fornecedor::updateOrCreate([
                'nome' => $request->nome,
                'site' => $request->site,
                'uf'   => $request->uf,
                'email'=> $request->email
            ]);

            $msg = "Cadastro realizado com sucesso";
        }
        
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id){
        echo $id;
    }
}
