<div class="container formulario" id="formulario">
	<h1 class="text-center mb-4">Formulário para Inscrição</h1>

	<p class="mb-4">Após a inscrição, você será redirecionado a página do <span>PAGSEGURO</span>, onde deve ser efetuado o pagamento.</p>

	<div class="row">
		<div class="col-12 col-lg-6">
			<h5>Valores até 08/04/2019:</h5>
			<ul class="mb-4">
                <li>Profissionais e outros: R$220,00</li>
				<li>Estudantes (Graduação e Pós-Graduação): R$170,00</li>
				<li>Sócios quites ABENEPI: R$170,00</li>
                <li>Grupos com 10 pessoas, desconto de 15% (Inscrições somente por email e depósito bancário): R$187,00</li>
			</ul>
		</div>

        <div class="col-12 col-lg-6">
            <h5>Valores até 09/05/2019:</h5>
            <ul class="mb-4">
                <li>Profissionais e outros: R$250,00</li>
                <li>Estudantes (Graduação e Pós-Graduação): R$190,00</li>
                <li>Sócios quites ABENEPI: R$190,00</li>
                <li>Grupos com 10 pessoas, desconto de 15% (Inscrições somente por email e depósito bancário): R$212,00</li>
            </ul>
        </div>

        <div class="col-12 col-lg-6">
            <h5>No Local:</h5>
            <ul class="mb-4">
                <li>Profissionais e outros: R$300,00</li>
                <li>Estudantes (Graduação e Pós-Graduação): R$250,00</li>
                <li>Sócios quites ABENEPI: R$250,00</li>
                <li>Grupos com 10 pessoas, desconto de 15% (Inscrições somente por email e depósito bancário): R$255,00</li>
            </ul>
        </div>
	</div>


    <form action="{{url('/inscricao')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name="compareceu" value="true">
        <input type="hidden" name="pagou" value="false">

        @if ($errors->any())
            <div id="erros" class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
        @endif

        <div class="alert alert-warning center-block text-center" role="alert">
          <i class="glyphicon glyphicon-exclamation-sign"></i>
          <span aria-hidden="true">Todos os campos são obrigatórios (exceto Complemento)</span>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-12 col-lg-3 mb-2">
                    <label id="label_form" for="nome" class="control-label">Nome</label>
                  <input type="text" class="form-control" name="nome" value="{{ old('nome')}}" required="required">
                </div>

                <div class="col-12 col-lg-3 mb-2">
                    <label id="label_form" for="cpf" class="control-label">CPF</label>
                    <input type="text" class="form-control" placeholder="000.000.000-00" data-mask='000.000.000-00' maxlength="11" name="cpf" value="{{ old('cpf') }}" required="required">
                </div>

            <div class="col-12 col-lg-3 mb-2">
                    <label id="label_form" for="nascimento" class="control-label">Data de Nascimento</label>
                    <input type="text" data-mask="00/00/0000" class="form-control" placeholder="dd/mm/yyyy" name="nascimento" value="{{ old('nascimento') }}" required="required">
            </div>

            <div class="col-12 col-lg-3 mb-2">
                    <label id="label_form" for="profissao" class="control-label">Profissão</label>
                    <input type="text" class="form-control" name="profissao" value="{{ old('profissao') }}" required="required">
            </div>

                <div class="col-12 mb-2">
                    <label id="label_form" for="endereco" class="control-label">Endereço</label>
                    <input type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" required="required">
                </div>

                <div class="col-12 col-lg-3 mb-2">
                    <label id="label_form" for="numero" class="control-label">Número</label>
                    <input type="text" class="form-control" name="numero" value="{{ old('numero') }}" required="required">
                </div>

                <div class="col-12 col-lg-3 mb-2">
                    <label id="label_form" for="complemento" class="control-label">Complemento (opcional)</label>
                    <input type="text" class="form-control" name="complemento" value="{{ old('complemento') }}" maxlength="20">
                </div>

                <div class="col-12 col-lg-3 mb-2">
                    <label id="label_form" for="bairro" class="control-label">Bairro</label>
                    <input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required="required">
                </div>

                <div class="col-12 col-lg-3 mb-2">
                    <label id="label_form" for="cep" class="control-label">CEP</label>
                    <input type="text" class="form-control" maxlength="8" placeholder="99999-999" data-mask='00000-000' name="cep" value="{{ old('cep') }}" required="required">
                </div>

                <div class="col-12 col-lg-6 mb-2">
                    <label id="label_form" for="estado" class="control-label">Estado</label>
                    {{-- <input type="text" class="form-control" maxlength="2" placeholder="SP" name="estado" value="{{ old('estado') }}" required="required"> --}}
                    {{ Form::select('estado', [
                        'AC'=>'Acre',
                        'AL'=>'Alagoas',
                        'AP'=>'Amapá',
                        'AM'=>'Amazonas',
                        'BA'=>'Bahia',
                        'CE'=>'Ceará',
                        'DF'=>'Distrito Federal',
                        'ES'=>'Espírito Santo',
                        'GO'=>'Goiás',
                        'MA'=>'Maranhão',
                        'MT'=>'Mato Grosso',
                        'MS'=>'Mato Grosso do Sul',
                        'MG'=>'Minas Gerais',
                        'PA'=>'Pará',
                        'PB'=>'Paraíba',
                        'PR'=>'Paraná',
                        'PE'=>'Pernambuco',
                        'PI'=>'Piauí',
                        'RJ'=>'Rio de Janeiro',
                        'RN'=>'Rio Grande do Norte',
                        'RS'=>'Rio Grande do Sul',
                        'RO'=>'Rondônia',
                        'RR'=>'Roraima',
                        'SC'=>'Santa Catarina',
                        'SP'=>'São Paulo',
                        'SE'=>'Sergipe',
                        'TO'=>'Tocantins'], null,
                        ['class' => 'form-control']) }}
                </div>

                <div class="col-12 col-lg-6 mb-2">
                    <label id="label_form" for="cidade" class="control-label">Cidade</label>
                    <input type="text" class="form-control" placeholder="São Carlos" name="cidade" value="{{ old('cidade') }}" required="required">
                </div>

                <div class="col-12 mb-2">
                    <label id="label_form" for="telefone" class="control-label">Celular</label>
                  <input type="text" class="form-control" maxlength="14" data-mask='(00)000000000' placeholder="(14)91234-5678" name="telefone" value="{{ old('telefone') }}" required="required">
                </div>

                <div class="col-12 col-lg-6 mb-2">
                    <label id="label_form" for="inputEmail3" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="email@exemplo.com.br" value="{{ old('email') }}" required="required">
                </div>

                <div class="col-12 col-lg-6 mb-2">
                    <label id="label_form" for="inputPassword3" class="control-label">Senha</label>
                  <input type="password" class="form-control" name="senha" id="inputsenha3" value="{{ old('senha') }}" required="required">
                </div>

                <div class="col-12 mt-4 mb-4">
                    <h5>Selecione uma das opções abaixo:</h5>
                </div>

                <div class="col-12 col-lg-6 mb-3">
                    <input type="radio" id="valor1" name="valor" onclick='$(this).val(250); $(".comprovante").css("display", "none"); $("#comprovante").attr("required", false);'>
                    <label for="valor1">Profissionais e outros: R$250,00</label>
                </div>

                <div class="col-12 col-lg-6 mb-3">
                    <input type="radio" id="valor2" name="valor" onclick='$(this).val(190); $(".comprovante").css("display", "none"); $("#comprovante").attr("required", false);'>
                    <label for="valor2">Sócios quites ABENEPI: R$190,00</label>
                </div>               

                <div class="col-12 col-lg-6 mb-3">
                    <input type="radio" id="valor3" name="valor" onclick='$(this).val(190); $(".comprovante").css("display", "block"); $("#comprovante").attr("required", true);'>
                    <label for="valor3">Estudantes (Graduação e Pós-Graduação): R$190,00</label>
                </div>

                <div class="col-12 mb-3 comprovante" style="display: none;">
                    <label for="comprovante">Por favor, anexe comprovante de estudante</label>
                    <input type="file" id="comprovante" name="comprovante">                    
                </div>

                <div class="text-center col-12 mt-3 mb-5">
                    <button type="submit" class="btn btn-default">Inscrever-se</button>
                </div>
            </div>{{-- End Row --}}
        </div>{{-- End Form-Group --}}
    </form>

	{{-- <h5> Inscrições pelo site encerradas </h5>
    <h5> Inscrições disponível somente no dia do evento </h5> --}}

    <p>Ao Núcleo São Carlos da Abenepi fica reservado o direito de aceitar somente as inscrições realizadas dentro do prazo e encerrá-las assim que todas as vagas forem preenchidas.</p>

    <p>Política de devolução do valor da inscrição: O pedido deve ser feito por email e será devolvido 85% do valor.</p>

    <p>Prazo para solicitação: <span>12/05/2019</span></p>

    <p>Em caso de dúvidas, entrar em contato com o email: <span>saocarlosabenepi@gmail.com</span></p>

    <h1 class="text-center mb-4">Gerar Nova Guia de Pagamento</h1>

    <form action="{{url('/emissaoPagamento')}}" method="post">
        @csrf

        @if ($errors->any())
            <div id="erros" class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
        @endif

        <div class="form-group">
            @include('flash::message')
            <div class="row justify-content-md-center">
                <div class="col-12 col-lg-7 mb-2">
                    <label id="label_form" for="cpf" class="control-label">Digite seu CPF abaixo pra gerar novo pagamento no PagSeguro</label>
                    <input type="text" class="form-control" placeholder="000.000.000-00" data-mask='000.000.000-00' maxlength="11" name="cpf" value="{{ old('cpf') }}" required="required">
                </div>
            </div>

            <div class="row">
                <div class="text-center col-12 mt-3 mb-5">
                    <button type="submit" class="btn btn-default">Gerar Pagamento</button>
                </div>
            </div>
        </div>
    </form> 
</div>
