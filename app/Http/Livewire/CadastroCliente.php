<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Uf;
use Illuminate\Support\Facades\Http;

class CadastroCliente extends Component
{
    public  $ufs = [];
    // campos da view
    public $tipoPessoa = '0';
    public $nome;
    public $email;
    public $cpf;
    public $rg;
    public $sexo;
    public $nascimento;
    public $cnpj;
    public $ie;
    public $telefone;
    public $celular;
    public $cep;
    public $logradouro;
    public $numero;
    public $complemento;
    public $bairro;
    public $cidade;
    public $uf;
    public $login;
    public $senha;
    public $confirmacao;
    public $termo;
    public $cadastrou = 0;
    // public $lista = ['Flavio', 'Flavia', 'Ana'];

    public function render()
    {
        $objeto_ufs = new Uf();
        $this->ufs = $objeto_ufs->ufs();
        return view('livewire.cadastro-cliente');
    }

    public function cadastrar() {

        $cliente = new Cliente();
        if ($this->tipoPessoa == 0) {
            $this->validate($cliente->rulesPf(), $cliente->feedback());    
        } else {
            $this->validate($cliente->rulesPj(), $cliente->feedback());
        }
        
        // persistir os dados no banco de dados        
        $cliente->tipo = $this->tipoPessoa;
        $cliente->nome = $this->nome;
        $cliente->email = $this->email;

        if ($this->tipoPessoa == 0) {
            $cliente->cpf = $this->cpf;
            $cliente->rg = $this->rg;
            $cliente->sexo = $this->sexo;
            $data_dma = $this->nascimento;
            $data_amd = date('Y/m/d', strtotime($data_dma));
            $cliente->nascimento = $data_amd;
        } else {
            $cliente->cnpj = $this->cnpj;
            $cliente->ie = $this->ie;
        }

        $cliente->telefone = $this->telefone;
        $cliente->celular = $this->celular;
        $cliente->rua = $this->logradouro;
        $cliente->numero = $this->numero;
        $cliente->complemento = $this->complemento;
        $cliente->bairro = $this->bairro;
        $cliente->cidades = $this->cidade;
        $cliente->estados = strtoupper($this->uf);
        $cliente->cep = $this->cep;
        $cliente->pais = 'Brasil';
        $cliente->login = $this->login;
        $cliente->senha = $this->senha;

        $cliente->status = '0';
        $cliente->lang = '1';
        $cliente->foto = ' ';
        $cliente->save();

        // verifica se usuario nao esta acadastrado ainda
        $user = new User();
        $user = $user->where('email', '=', $this->email)->get()->first();
        if (!isset($user) || $user->count() == 0) {
            // criar o usuário para login
            $userNovo = new User();
            $userNovo->name = $this->nome;
            $userNovo->email = $this->email;
            $userNovo->password = bcrypt($this->senha);
            $userNovo->perfil = 'cli';
            $userNovo->save();
        }

        // enviar mensagem de bem sucedido
        $this->cadastrou = 1;
    }

    
    public function updated($field)
   	{
        // echo 'Entrou update';
        // mascara de cpf
   		if ($field == 'cpf') {
            $inputLength = strlen($this->cpf);
                
            if ($inputLength === 3 | $inputLength === 7) {
                $this->cpf = $this->cpf . '.';
            }
            if ($inputLength === 11) {
                $this->cpf = $this->cpf . '-';
            }
   		}

        // mascara de cnpj
   		if ($field == 'cnpj') {
            $inputLength = strlen($this->cnpj);
                
            if ($inputLength === 2 | $inputLength === 6) {
                $this->cnpj = $this->cnpj . '.';
            }
            if ($inputLength === 10) {
                $this->cnpj = $this->cnpj . '/';
            }
            if ($inputLength === 15) {
                $this->cnpj = $this->cnpj . '-';
            }
        }

        // mascara de cep
   		if ($field == 'cep') {
            $inputLength = strlen($this->cep);
                
            if ($inputLength === 5) {
                $this->cep = $this->cep . '-';
            }
            if ($inputLength === 9) {
                $this->buscaCep();
            }
        }

        // mascara de telefone
   		if ($field == 'telefone') {
            $inputLength = strlen($this->telefone); 
            if ($inputLength === 1) {
                $this->telefone = '(' .$this->telefone;
            }
            if ($inputLength === 3) {
                $this->telefone = $this->telefone. ') ';
            }
            if ($inputLength === 10) {
                $this->telefone = $this->telefone . '-';
            }
   		}

        // mascara de celular
   		if ($field == 'celular') {
            $inputLength = strlen($this->celular); 
            if ($inputLength === 1) {
                $this->celular = '(' .$this->celular;
            }
            if ($inputLength === 3) {
                $this->celular = $this->celular. ') ';
            }
            if ($inputLength === 10) {
                $this->celular = $this->celular . '-';
            }
   		}
        
    }

    public function buscaCep()
   	{
        $cep = $this->cep;
        
        $url = "https://viacep.com.br/ws/$cep/json/";
        $response = Http::get($url);
        $endereco = $response->json();
        // dd($endereco);
        if ($endereco['logradouro']) {
            $this->logradouro = $endereco['logradouro'];
        }
        if ($endereco['bairro']) {
            $this->bairro = $endereco['bairro'];
        }
        if ($endereco['localidade']) {
            $this->cidade = $endereco['localidade'];
        }
        if ($endereco['uf']) {
            $this->uf = $endereco['uf'];
        }
    }
    
}
