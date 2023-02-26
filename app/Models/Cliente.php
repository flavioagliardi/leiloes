<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cadastro';

    // protected $fillable = ['cnpj', 'nome', 'email', 'telefone', 'site', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'cep'];

    public function rulesPf() {
        return [
            'nome' => 'required',
            'email' => 'required|unique:cadastro,email,'.$this->id.'|email',
            'cpf' => 'required|unique:cadastro,cpf,'.$this->id.'|cpf',
            'rg' => 'required',
            'sexo' => 'required',
            'nascimento' => 'required',
            'telefone' => 'required',
            // 'cep' => 'required',
            // 'logradouro' => 'required',
            // 'numero' => 'required',
            // 'bairro' => 'required',
            // 'cidade' => 'required',
            // 'uf' => 'required',
            // 'login' => 'unique:cadastro,login,'.$this->id,
            // 'senha' => 'required',
            // 'confirmacao' => 'required',
            'termo' => 'required',
        ];
    }
    public function rulesPj() {
        return [
            'nome' => 'required',
            'email' => 'unique:cadastro,email,'.$this->id.'|email',
            'cnpj' => 'unique:cadastro,cnpj,'.$this->id.'|cnpj',
            'ie' => 'required',
            'telefone' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'login' => 'unique:cadastro,login,'.$this->id,
            'senha' => 'required',
            'confirmacao' => 'required',
        ];
    }

    public function feedback() {
        return [
            'required' => 'O :attribute é obrigatório',
            'cnpj.unique' => 'O CNPJ informado já existe',
            'cnpj.cnpj' => 'O CNPJ é inválido',
            'email.unique' => 'O email informado já existe',
            'email.email' => 'O email é inválido',
            'cpf.unique' => 'O CPF informado já existe',
            'cpf.cpf' => 'O CPF é inválido',
            'login.unique' => 'O usuário informado já existe',
        ];
    }
}
