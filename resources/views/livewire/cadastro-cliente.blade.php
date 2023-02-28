<div>

    @if(isset($pessoa->id))
    <form class="form-group" method="post" action="">
        @csrf
        @method('PUT')

    @else
    <form class="form-group" method="post" action="">
        @csrf
    @endif
    <div class="container text-primary mt-5">
        <div class="scroll row justify-content-center text-primary">
            <div class="col-md-12">
                @if($cadastrou == 1)
                    <div class="container">
                        <div class="alert alert-success text-center" role="alert">
                            <p>Seu cadastro foi executado com sucesso. Aguarde a validação dos seus dados e liberação para efetuar lances!</p>
                            <a class="btn btn-sm btn-outline-success" href="{{ route('site') }}"> Ok</a>
                        </div>
                    </div>
                @else
                <div class="card mb-5">
                    <div class="card-header">Cadastro de cliente</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="form-check col-4 col-lg-2">
                                <input class="form-check-input" type="radio" value="0" checked name="tipoPf" wire:model="tipoPessoa">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Pessoa física
                                </label>
                            </div>
                            <div class="form-check col-4 col-lg-3">
                                <input class="form-check-input" type="radio"  value="1" name="tipoPj"  wire:model="tipoPessoa">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Pessoa jurídica
                                </label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="container px-4">
                                <div class="row">
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
                            </div>

                            @if($tipoPessoa == '0')
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
                                            <input type="date" class="{{ $errors->has('nascimento') ? 'form-control is-invalid' : 'form-control'}}" wire:model="nascimento">
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
                                            <input type="text" class="{{ $errors->has('cnpj') ? 'form-control is-invalid' : 'form-control'}}" wire:model="cnpj">
                                            @if($errors->has('cnpj'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('cnpj') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mt-2">  
                                            <label for="inputIe" class="form-label">IE*</label>
                                            <input type="text" class="{{ $errors->has('ie') ? 'form-control is-invalid' : 'form-control'}}" wire:model="ie">
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
                            <div class="container px-4">
                                <div class="row">
                                    <div class="col-lg-6 mt-2">  
                                        <label for="inputTelefone" class="form-label">Telefone*</label>
                                        <input type="text" class="{{ $errors->has('telefone') ? 'form-control is-invalid' : 'form-control'}}" wire:model="telefone">
                                        @if($errors->has('telefone'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('telefone') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mt-2">  
                                        <label for="inputCelular" class="form-label">Celular</label>
                                        <input type="text" class="{{ $errors->has('celular') ? 'form-control is-invalid' : 'form-control'}}" wire:model="celular">
                                        @if($errors->has('celular'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('celular') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-2 mt-2">  
                                        <label for="inputCep" class="form-label">CEP*</label>
                                        <input type="text" class="{{ $errors->has('cep') ? 'form-control is-invalid' : 'form-control'}}" name="cep" wire:model="cep">
                                        @if($errors->has('cep'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('cep') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mt-2">  
                                        <label for="inputLogradouro" class="form-label">Logradouro*</label>
                                        <input type="text" class="{{ $errors->has('logradouro') ? 'form-control is-invalid' : 'form-control'}}" id="logradouro" wire:model="logradouro">
                                        @if($errors->has('logradouro'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('logradouro') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-2 mt-2">  
                                        <label for="inputNumero" class="form-label">Número*</label>
                                        <input type="text" class="{{ $errors->has('numero') ? 'form-control is-invalid' : 'form-control'}}" wire:model="numero">
                                        @if($errors->has('numero'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('numero') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-2 mt-2">  
                                        <label for="inputComplemento" class="form-label">Complemento</label>
                                        <input type="text" class="{{ $errors->has('complemento') ? 'form-control is-invalid' : 'form-control'}}" wire:model="complemento">
                                        @if($errors->has('complemento'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('complemento') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 mt-2">  
                                        <label for="inputBairro" class="form-label">Bairro*</label>
                                        <input type="text" class="{{ $errors->has('bairro') ? 'form-control is-invalid' : 'form-control'}}" id="bairro" wire:model="bairro">
                                        @if($errors->has('bairro'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('bairro') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 mt-2">  
                                        <label for="inputCidade" class="form-label">Cidade*</label>
                                        <input type="text" class="{{ $errors->has('cidade') ? 'form-control is-invalid' : 'form-control'}}" id="cidade" wire:model="cidade">
                                        @if($errors->has('cidade'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('cidade') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 mt-2">  
                                        <label for="inputUf" class="form-label">UF*</label>
                                        <select id="uf" name="uf" class="{{ $errors->has('uf') ? 'form-control is-invalid' : 'form-control'}}" name="uf" wire:model="uf">
                                            <option value="">-- Selecione --</option>
                                            @foreach($ufs as $uf => $nome)
                                                <option value="{{ $uf }}" {{ ($cliente->uf ?? old('uf')) == $uf ? 'selected' : '' }}>{{ $nome }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('uf') }}
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-2">  
                                        <label for="inputCidade" class="form-label">Usuário*</label>
                                        <input type="text" class="{{ $errors->has('login') ? 'form-control is-invalid' : 'form-control'}}" id="login" wire:model="login">
                                        @if($errors->has('login'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('login') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 mt-2">  
                                        <label for="inputSenha" class="form-label">Senha*</label>
                                        <input type="password" class="{{ $errors->has('senha') ? 'form-control is-invalid' : 'form-control'}}" id="senha" wire:model="senha">
                                        @if($errors->has('senha'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('senha') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 mt-2">  
                                        <label for="inputConfirmacao" class="form-label">Confirmação*</label>
                                        <input type="password" class="{{ $errors->has('confirmacao') ? 'form-control is-invalid' : 'form-control'}}" id="confirmacao" wire:model="confirmacao">
                                        @if($errors->has('confirmacao'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('confirmacao') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                
                    <div class="card-footer text-muted">
                        <div class="container px-5">
                            <div class="row justify-content-between">
                                <div class="form-check col-8 col-lg-4">
                                    <input class="{{$errors->first('termo') ? 'form-check-input is-invalid' : 'form-check-input'}}" type="checkbox" wire:model="termo" value="0">
                                    <label class="form-check-label" for="inlineCheckbox1">Eu aceito os 
                                        <a href="">Termos de uso*</a>
                                    </label>
                                    @if($errors->has('termo'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('termo') }}
                                        </div>
                                    @endif
                                </div>
                                
                                <button class="btn btn-primary col-3 col-lg-2" type="button" wire:click="cadastrar()">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </form>
</div>
