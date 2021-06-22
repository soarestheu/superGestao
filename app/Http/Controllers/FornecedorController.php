<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome' =>'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '000.00.000',
                'ddd' => '11',
                'telefone' => '2224-0000'
            ],
            1 => [
                'nome' =>'Fornecedor 2',
                'status' => 's',
                'cnpj' => null,
                'ddd' => '85',
                'telefone' => '1231-0000'
            ],
            2 => [
                'nome' =>'Fornecedor 2',
                'status' => 's',
                'cnpj' => null,
                'ddd' => '32',
                'telefone' => '1221-0000'
            ]
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
