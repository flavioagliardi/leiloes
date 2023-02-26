<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Uf;

class CadastroCliente extends Component
{
    public  $ufs = [];
    public $cliente;
    //campos da view
    public $tipoPessoa = 0;
    public $nome;
    public $email;
    public $cpf;
    public $rg;
    public $sexo;
    public $nascimento;
    // public $lista = ['Flavio', 'Flavia', 'Ana'];

    public function render()
    {
        $objeto_ufs = new Uf();
        $this->ufs = $objeto_ufs->ufs();
        return view('livewire.cadastro-cliente');
    }

    public function cadastrar() {

        // $ufs = new Uf();
        // $lista_ufs = $ufs->ufs();
        $this->cliente = new Cliente();
        if ($this->tipoPessoa == 0) {
            $this->validate($this->cliente->rulesPf(), $this->cliente->feedback());    
        } else {
            $this->validate($this->cliente->rulesPj(), $this->cliente->feedback());
        }
        

        dd($this->ufs);
        
        $cliente = $cliente->where('cpf','412.007.130-87')->get()->first();
        dd($cliente->nome);
    }

    function validaCpf() {

        if (! $this->cpf) {
     
            return '';
     
        }
     
        if (strlen($this->cpf) == 11) {
     
            return substr($this->cpf, 0, 3) . '.' . substr($this->cpf, 3, 3) . '.' . substr($this->cpf, 6, 3) . '-' . substr($this->cpf, 9);
     
        }
     
        return $this->cpf;
     
     }
}
