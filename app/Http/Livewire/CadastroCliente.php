<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Uf;

class CadastroCliente extends Component
{
    public function render()
    {
        return view('livewire.cadastro-cliente');
    }

    public function cadastrar() {

        $ufs = new Uf();
        $lista_ufs = $ufs->ufs();

        $cliente = new Cliente();
        $cliente = $cliente->where('cpf','412.007.130-87')->get()->first();
        dd($cliente->nome);
    }
}
