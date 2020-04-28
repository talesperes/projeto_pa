<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-5 pb-0 mt-3 mb-3">
                <h2 class="text-primary"><strong>Cadastro</strong></h2>
                <p>Preencha o formulário abaixo:</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="dados-pessoais"><strong>Dados Pessoais</strong></li>
                                <li id="escolaridade"><strong>Escolaridade</strong></li>
                                <li id="login"><strong>Dados de Login</strong></li>
                                <li id="confirm"><strong>Finalizar</strong></li>
                            </ul> <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-primary">Dados Pessoais</h2>
                                    <div class="form-group">
										<label>Nome Completo</label>
									    <input type="text" id="nome" name="nome" class="form-control">						    
								    </div>
								    <div class="form-group">
										<label>Celular</label>
									    <input type="text" id="celular" name="celular" class="form-control">						    
								    </div>
	                                <div class="form-group">
								    	<div class="form-row">
								    		<div class="col-md-6 mb-2">
			                                    <label>Sexo</label>
			                                    <select id="sexo" name="sexo" class="form-control">
			                                    	<option value="F">Feminino</option>
			                                    	<option value="M">Masculino</option>
			                                    </select>
			                                </div>
			                                <div class="col-md-6">
			                                    <label>Data de Nascimento</label>
			                                    <input type="date" id="data_nascimento" name="data_nascimento" class="form-control">
			                                </div>
			                            </div>
	                                </div>
	                                <div class="form-group">
	                                	<h6 class="pt-4 text-primary font-weight-bold text-uppercase">Localização</h6>
								    	<div class="form-row pt-2">
								    		<div class="col-md-8 mb-2">
			                                    <label>Cidade</label>
			                                    <input type="text" id="cidade" name="cidade" class="form-control">
			                                </div>
			                                <div class="col-md-4">
			                                    <label>Estado</label>
			                                    <select id="estado" name="estado" class="form-control">
			                                    	<option value="AC">AC</option>
			                                    	<option value="AL">AL</option>
			                                    	<option value="AP">AP</option>
			                                    	<option value="AM">AM</option>
			                                    	<option value="BA">BA</option>
			                                    	<option value="CE">CE</option>
			                                    	<option value="DF">DF</option>
			                                    	<option value="ES">ES</option>
			                                    	<option value="GO">GO</option>
			                                    	<option value="MA">MA</option>
			                                    	<option value="MT">MT</option>
			                                    	<option value="MS">MS</option>
			                                    	<option value="MG">MG</option>
			                                    	<option value="PA">PA</option>
			                                    	<option value="PB">PB</option>
			                                    	<option value="PR">PR</option>
			                                    	<option value="PE">PE</option>
			                                    	<option value="PI">PI</option>
			                                    	<option value="RJ">RJ</option>
			                                    	<option value="RN">RN</option>
			                                    	<option value="RS">RS</option>
			                                    	<option value="RO">RO</option>
			                                    	<option value="RR">RR</option>
			                                    	<option value="SC">SC</option>
			                                    	<option value="SP">SP</option>
			                                    	<option value="SE">SE</option>
			                                    	<option value="TO">TO</option>
			                                    </select>
			                                </div>
			                            </div>
	                                </div>
	                                <div class="form-group">
	                                	<h6 class="pt-4 text-primary font-weight-bold text-uppercase">Redes Sociais</h6>
								    	<div class="form-row pt-2">
								    		<div class="col-md-3 mb-2">
			                                    <label><i class="fab fa-instagram"></i> Instagram</label>
			                                    <input type="text" id="instagram" name="instagram" class="form-control">
			                                </div>
			                                <div class="col-md-3 mb-2">
			                                    <label><i class="fab fa-twitter"></i> Twitter</label>
			                                    <input type="text" id="twitter" name="twitter" class="form-control">
			                                </div>
			                                <div class="col-md-3 mb-2">
			                                    <label><i class="fab fa-facebook-f"></i> Facebook</label>
			                                    <input type="text" id="facebook" name="facebook" class="form-control">
			                                </div>
			                                <div class="col-md-3">
			                                    <label><i class="fab fa-youtube"></i> Youtube</label>
			                                    <input type="text" id="youtube" name="youtube" class="form-control">
			                                </div>
			                            </div>
	                                </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Continuar">
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-primary">Escolaridade</h2>
                                    <div class="form-group">
										<label>Nível de Escolaridade</label>
									    <select id="nivel_escolaridade" name="nivel_escolaridade" class="form-control">
									    	<option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
									    	<option value="Ensino Médio Completo">Ensino Médio Completo</option>
									    	<option value="Superior Incompleto">Superior Incompleto</option>
									    	<option value="Superior Completo">Superior Completo</option>
									    	<option value="Cursando Técnico">Cursando Técnico</option>
									    </select>						    
								    </div>

								    <div class="form-group">
										<label>Instituição</label>
									    <input type="text" id="instituicao" name="instituicao" class="form-control">						    
								    </div>
								    <div class="form-group">
	                                    <label>Curso</label>
								    	<input type="text" id="curso" name="curso" class="form-control">
		                            </div>
		                            <div class="form-group">
		                            	<div class="form-row">
			                            	<div class="col-md-6 mb-2">
			                                    <label>Ano de Início</label>   
												<select id="ano_inicio" name="ano_inicio" class="form-control">
												    <option>Selecionar</option>
											     </select>
			                                </div>
			                                <div class="col-md-6">
			                                    <label>Ano de Conclusão</label>   
												<select id="ano_conclusao" name="ano_conclusao" class="form-control">
												    <option>Selecionar</option>
											     </select>
			                                </div>
			                            </div>
		                            </div>


									<div class="row">
										<div class="col-md-12 text-right">
											<button class="btn btn-primary" style="border-radius: 30px;">+</button>
										</div>
									</div>

                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Voltar"> 
                                <input type="button" name="next" class="next action-button" value="Continuar">
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-primary">Dados de Login</h2>
                                    <div class="form-group">
										<label>Email</label>
									    <input type="email" id="email" name="email" class="form-control">						    
								    </div>
								    <div class="form-group">
										<label>Senha</label>
									    <input type="password" id="senha" name="senha" class="form-control">						    
								    </div>
								    <div class="form-group">
										<label>Confirme sua senha</label>
									    <input type="password" id="senha_confirm" name="senha_confirm" class="form-control">						    
								    </div>
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Voltar"> 
                                <input type="button" id="btnCadastro" name="make_payment" class="next action-button" value="Finalizar">
                            </fieldset>
                            <fieldset>
                                <div class="form-card" id="cadastro-ok" hidden>
                                    <h2 class="fs-title text-center mb-0">Cadastro finalizado!</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="<?=site_url('assets/imagens/check.png')?>" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Você se cadastrou com sucesso!</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-card" id="cadastro-erro" hidden>
                                    <h2 class="fs-title text-center mb-0">Erro!</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="<?=site_url('assets/imagens/check.png')?>" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Erro ao realizar o cadastro. Tente novamente mais tarde!</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

	$( "#btnCadastro" ).click(function() {
		var sendData = {};

		sendData.escolaridade = $("#escolaridade").val();
		sendData.nome = $("#nome").val();
		sendData.celular = $("#celular").val();
		sendData.sexo = $("#sexo").val();
		sendData.data_nascimento = $("#data_nascimento").val();
		sendData.cidade = $("#cidade").val();
		sendData.estado = $("#estado").val();
		sendData.instagram = $("#instagram").val();
		sendData.twitter = $("#twitter").val();
		sendData.facebook = $("#facebook").val();
		sendData.youtube = $("#youtube").val();
		sendData.nivel_escolaridade = $("#nivel_escolaridade").val();
		sendData.instituicao = $("#instituicao").val();
		sendData.curso = $("#curso").val();
		sendData.ano_inicio = $("#ano_inicio").val();
		sendData.ano_conclusao = $("#ano_conclusao").val();
		sendData.email = $("#email").val();
		sendData.senha = $("#senha").val();
		sendData.senha_confirm = $("#senha_confirm").val();

		console.log(sendData);

		$.ajax({
	    	type:"POST",
	        cache:false,
	        url:"<?=base_url('Cadastro/cadastrar')?>",
	        data:sendData,
	        success: function (response) {
	        	console.log(response);
	        	console.log('sucesso');
	        	if(response == "200") {
	        		console.log('aqui1');
	        		$("#cadastro-ok").removeAttr('hidden');
	        	} else if (response == "400") {
	        		console.log('aqui2');
	        		$("#cadastro-erro").removeAttr('hidden');
	        	}
	        }
	    });

	});

	
</script>