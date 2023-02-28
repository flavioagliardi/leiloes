
<style>
    #div-pf {
        display: block;
    }
    #div-pj {
        display: none;
    }
</style>

<script>


    // function alternarDisplay(tipo){
        
    //     {{-- var tipo = document.getElementById('tipoPessoa').value; --}}
    //     console.log(tipo)
    //     if (tipo == '0') {
    //         document.getElementById('div-pf').style.display = 'block';
    //         document.getElementById('div-pj').style.display = 'none';
    //     } else {
    //         document.getElementById('div-pf').style.display = 'none';
    //         document.getElementById('div-pj').style.display = 'block';
    //     }
        
    // }

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

                            @if($tipoPessoa == '0')
                                
                            @else
                                Pessoa Juridica
                            @endif
                            
                            
                            
                            
                            
                            <!-- Dados comuns para PF e PJ -->
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
                                            {{-- Informe o termo --}}
                                        </div>
                                    @endif
                                </div>
                                
                                <button class="btn btn-primary col-3 col-lg-2" type="button" wire:click="cadastrar()">Cadastrar</button>
                            </div>
                        </div>
                        
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

{{-- </form> --}}

</div>
