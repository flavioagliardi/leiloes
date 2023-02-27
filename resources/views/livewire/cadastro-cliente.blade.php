<div>
    <style>
    #div-pf {
        display: block;
    }
    #div-pj {
        display: none;
    }
</style>

<script>

    function enviar() {
        
        console.log('Carregou a pagina')
        document.getElementById('tipoPessoa').value = 1
    }

    function alternarDisplay(tipo){
        
        {{-- var tipo = document.getElementById('tipoPessoa').value; --}}
        console.log(tipo)
        if (tipo == '0') {
            document.getElementById('div-pf').style.display = 'block';
            document.getElementById('div-pj').style.display = 'none';
        } else {
            document.getElementById('div-pf').style.display = 'none';
            document.getElementById('div-pj').style.display = 'block';
        }
        

    }
</script>


@if(isset($pessoa->id))
<form class="form-group" method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
    @csrf
    @method('PUT')

@else
<form class="form-group" method="post" action="">
    @csrf
@endif


    <div class="container text-primary mt-5">
        <div class="scroll row justify-content-center text-primary">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cadastro de cliente</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="form-check col-4 col-lg-2">
                                <input class="form-check-input" type="radio" value="0" wire:model="tipoPessoa">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Pessoa física
                                </label>
                            </div>
                            <div class="form-check col-4 col-lg-3">
                                <input class="form-check-input" type="radio"  value="1" wire:model="tipoPessoa">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Pessoa jurídica
                                </label>
                            </div>

                            <!-- Dados comuns para PF e PJ -->
                            <div class="row mt-3">
                                <div class="col-lg-6 mt-2">  
                                    <label for="inputNome" class="form-label">Nome*</label>
                                    <input type="text" class="{{ $errors->has('nome') ? 'form-control is-invalid' : 'form-control'}}" wire:model="nome">
                                    @if($errors->has('nome'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nome') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-6 mt-2">  
                                    <label for="inputEmail" class="form-label">Email*</label>
                                    <input type="text" class="{{ $errors->has('email') ? 'form-control is-invalid' : 'form-control'}}" wire:model="email">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if($tipoPessoa == 0)
                            <!-- Dados para PF -->
                            <div class="container px-4">
                                <div class="row">
                                    <div class="col-lg-6 mt-2">  
                                        <label for="inputCpf" class="form-label">CPF*</label>
                                        <input type="text" class="{{ $errors->has('cpf') ? 'form-control is-invalid' : 'form-control'}}" id="cpf" wire:model="cpf">
                                        @if($errors->has('cpf'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('cpf') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mt-2">  
                                        <label for="inputRg" class="form-label">RG*</label>
                                        <input type="text" class="{{ $errors->has('rg') ? 'form-control is-invalid' : 'form-control'}}"  wire:model="rg">
                                        @if($errors->has('rg'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('rg') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mt-2">  
                                        <label for="inputSexo" class="form-label">Sexo*</label>
                                        <select name="sexo" class="{{ $errors->has('sexo') ? 'form-control is-invalid' : 'form-control'}}" wire:model="sexo">
                                            <option value="">-- Selecione --</option>
                                            <option value="0">Feminino</option>
                                            <option value="1">Masculino</option>
                                        </select> 
                                        @if($errors->has('cpf'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('sexo') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mt-2">  
                                        <label for="inputRg" class="form-label">Data de nascimento*</label>
                                        <input type="date" class="{{ $errors->has('nascimento') ? 'form-control is-invalid' : 'form-control'}}" name="nascimento" id="nascimento" value="{{ $cliente->nascimento ?? old('nascimento') }}">
                                        @if($errors->has('rg'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('nascimento') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            @else
                            <!-- Dados para PJ -->
                            <div class="container px-4">
                                <div class="row">
                                    <div class="col-lg-6 mt-2">  
                                        <label for="inputCnpj" class="form-label">CNPJ*</label>
                                        <input type="text" class="{{ $errors->has('cnpj') ? 'form-control is-invalid' : 'form-control'}}" name="cnpj" id="cnpj" value="{{ $cliente->cnpj ?? old('cnpj') }}">
                                        @if($errors->has('cnpj'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('cnpj') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mt-2">  
                                        <label for="inputIe" class="form-label">IE*</label>
                                        <input type="text" class="{{ $errors->has('ie') ? 'form-control is-invalid' : 'form-control'}}" name="ie" id="ie" value="{{ $cliente->ie ?? old('ie') }}">
                                        @if($errors->has('ie'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('ie') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>    
                            </div>
                            @endif
                            <!-- Dados comuns para PF e PJ -->
                            <div class="row">
                                <div class="col-lg-6 mt-2">  
                                    <label for="inputTelefone" class="form-label">Telefone*</label>
                                    <input type="text" class="{{ $errors->has('telefone') ? 'form-control is-invalid' : 'form-control'}}" name="telefone" id="telefone" value="{{ $cliente->nome ?? old('telefone') }}">
                                    @if($errors->has('telefone'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('telefone') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-6 mt-2">  
                                    <label for="inputCelular" class="form-label">Celular</label>
                                    <input type="text" class="{{ $errors->has('celular') ? 'form-control is-invalid' : 'form-control'}}" name="celular" id="celular" value="{{ $cliente->celular ?? old('celular') }}">
                                    @if($errors->has('celular'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('celular') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer text-muted">
                        <div class="container px-5">
                            <div class="row justify-content-between">
                                <div class="form-check col-8 col-lg-4">
                                    <input class="{{$errors->first('termo') ? 'form-check-input is-invalid' : 'form-check-input'}}" type="checkbox" id="termo" name="termo" value="0">
                                    <label class="form-check-label" for="inlineCheckbox1">Eu aceito os 
                                        <a href="">Termos de uso*</a>
                                    </label>
                                    @if($errors->has('termo'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('termo') }}
                                            {{-- Informe o termo --}}
                                        </div>
                                    @endif
                                </div>
                                
                                <button class="btn btn-primary col-3 col-lg-2" wire:click="cadastrar()">Cadastrar</button>
                            </div>
                        </div>
                        
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

</form>

</div>
