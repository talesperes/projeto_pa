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
									    <input type="text" id="nome" name="nome" class="form-control validate-stepper">						    
								    </div>
								    <div class="form-group">
										<label>Telefone/Celular</label>
									    <input type="text" id="telefone" name="telefone" class="form-control validate-stepper">						    
								    </div>
	                                <div class="form-group">
								    	<div class="form-row">
								    		<div class="col-md-6 mb-2">
			                                    <label>Sexo</label>
			                                    <select id="sexo" name="sexo" class="form-control validate-stepper">
			                                    	<option value="F">Feminino</option>
			                                    	<option value="M">Masculino</option>
			                                    </select>
			                                </div>
			                                <div class="col-md-6">
			                                    <label>Data de Nascimento</label>
			                                    <input type="date" id="data_nascimento" name="data_nascimento" class="form-control validate-stepper">
			                                </div>
			                            </div>
	                                </div>
	                                <div class="form-group">
	                                	<h6 class="pt-4 text-primary font-weight-bold text-uppercase">Localização</h6>
						<div class="form-row pt-2">
			                                <div class="col-md-4">
			                                    <label>Estado</label>
			                                    <select id="estado" name="estado" class="form-control validate-stepper">
			                                    	<option value="">Selecione um Estado</option>
			                                    	<option value="AC">Acre</option>
													<option value="AL">Alagoas</option>
													<option value="AP">Amapá</option>
													<option value="AM">Amazonas</option>
													<option value="BA">Bahia</option>
													<option value="CE">Ceará</option>
													<option value="DF">Distrito Federal</option>
													<option value="ES">Espírito Santo</option>
													<option value="GO">Goiás</option>
													<option value="MA">Maranhão</option>
													<option value="MT">Mato Grosso</option>
													<option value="MS">Mato Grosso do Sul</option>
													<option value="MG">Minas Gerais</option>
													<option value="PA">Pará</option>
													<option value="PB">Paraíba</option>
													<option value="PR">Paraná</option>
													<option value="PE">Pernambuco</option>
													<option value="PI">Piauí</option>
													<option value="RJ">Rio de Janeiro</option>
													<option value="RN">Rio Grande do Norte</option>
													<option value="RS">Rio Grande do Sul</option>
													<option value="RO">Rondônia</option>
													<option value="RR">Roraima</option>
													<option value="SC">Santa Catarina</option>
													<option value="SP">São Paulo</option>
													<option value="SE">Sergipe</option>
													<option value="TO">Tocantins</option>
			                                    </select>
			                                </div>
							<div class="col-md-8 mb-2">
							    <label>Cidade</label>
							    <select id="cidade" name="cidade" class="form-control validate-stepper">
								<option value="">-</option>
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
			                                    <label><i class="fab fa-github"></i> GitHub</label>
			                                    <input type="text" id="github" name="github" class="form-control">
			                                </div>
			                            </div>
	                                </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Continuar">
                            </fieldset>
                            <fieldset>
                            	<div id="div_escolaridade">
                                <div class="form-card dados-escolaridade">
                                    <h2 class="fs-title text-primary">Escolaridade</h2>
                                    <div class="form-group">
													<label>Nível de Escolaridade</label>
									   			<select id="nivel_escolaridade" class="form-control campo_escolaridade">
												    	<option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
												    	<option value="Ensino Médio Completo">Ensino Médio Completo</option>
												    	<option value="Superior Incompleto">Superior Incompleto</option>
												    	<option value="Superior Completo">Superior Completo</option>
												    	<option value="Cursando Técnico">Cursando Técnico</option>
												    </select>						    
											    </div>

											   <div class="form-group">
													<label>Instituição</label>
												   <input type="text" id="instituicao" name="instituicao" class="campo_escolaridade form-control validate-stepper">						    
											   </div>
								    			<div class="form-group">
	                                    <label>Curso</label>
								    				<input type="text" class="campo_escolaridade form-control validate-stepper">
		                           	</div>
		                           	<div class="form-group">
		                            		<div class="form-row">
				                            	<div class="col-md-6 mb-2">
				                                 <label>Ano de Início</label>   
													<select id="ano_inicio" name="ano_inicio" class="campo_escolaridade form-control validate-stepper">
											   			<option value="">Selecionar</option>
											   			<option value="2015">2015</option>
											   			<option value="2016">2016</option>
											   			<option value="2017">2017</option>
											   			<option value="2018">2018</option>
											   			<option value="2019">2019</option>
											   			<option value="2020">2020</option>
										      		</select>
				                              	</div>
				                              	<div class="col-md-6">
				                                	<label>Ano de Conclusão</label>   
													<select id="ano_conclusao" name="ano_conclusao" class="campo_escolaridade form-control validate-stepper">
										    			<option value="">Selecionar</option>
										    			<option value="2015">2015</option>
											   			<option value="2016">2016</option>
											   			<option value="2017">2017</option>
											   			<option value="2018">2018</option>
											   			<option value="2019">2019</option>
											   			<option value="2020">2020</option>
									     			</select>
				                            	</div>
			                            	</div>
		                           	</div>
									<div class="row">
										<div class="col-md-12 text-right">
											<div class="add_escolaridade btn btn-primary" style="border-radius: 30px;">+</div>
										</div>
									</div>

								</div>

                                </div> <!-- aqui -->
                                <input type="button" name="previous" class="previous action-button-previous" value="Voltar"> 
                                <input type="button" name="next" class="next action-button" value="Continuar">
                           </fieldset>
                           <fieldset>
                              <div class="form-card">
                                    <h2 class="fs-title text-primary">Dados de Login</h2>
                                    <div class="form-group">
										<label>Email</label>
									    <input type="email" id="email" name="email" class="form-control validate-stepper">						    
								    </div>
								    <div class="form-group">
										<label>Senha</label>
									    <input type="password" id="senha" name="senha" class="form-control validate-stepper validate-password">						    
								    </div>
								    <div class="form-group">
										<label>Confirme sua senha</label>
									    <input type="password" id="senha_confirm" name="senha_confirm" class="form-control validate-stepper validate-password">						    
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
                                    <h2 class="fs-title text-center mb-0">Não foi possível concluir seu cadastro</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="<?=base_url('assets/imagens/error.png')?>" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Tente novamente mais tarde.</h5>
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

	$(document).on('click','.add_escolaridade', function() {

		var html =	'<div class="form-card dados-escolaridade">'+
	         '<h2 class="fs-title text-primary">Escolaridade</h2>'+
	         '<div class="form-group">'+
					'<label>Nível de Escolaridade</label>'+
	   			'<select id="nivel_escolaridade" class="campo_escolaridade form-control">'+
				    	'<option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>'+
				    	'<option value="Ensino Médio Completo">Ensino Médio Completo</option>'+
				    	'<option value="Superior Incompleto">Superior Incompleto</option>'+
				    	'<option value="Superior Completo">Superior Completo</option>'+
				    	'<option value="Cursando Técnico">Cursando Técnico</option>'+
				    '</select>'+
			    '</div>'+
			   '<div class="form-group">'+
					'<label>Instituição</label>'+
				   '<input type="text" id="instituicao" name="instituicao" class="campo_escolaridade form-control validate-stepper">'+				    
			   '</div>'+
	 			'<div class="form-group">'+
	            '<label>Curso</label>'+
	 				'<input type="text" class="campo_escolaridade form-control validate-stepper">'+
	      	'</div>'+
	      	'<div class="form-group">'+
	       		'<div class="form-row">'+
	             	'<div class="col-md-6 mb-2">'+
	                  '<label>Ano de Início</label>'+
							'<select id="ano_inicio" name="ano_inicio" class="campo_escolaridade form-control validate-stepper">'+
					   		'<option value="">Selecionar</option>'+
					   		'<option value="2015">2015</option>'+
				   			'<option value="2016">2016</option>'+
				   			'<option value="2017">2017</option>'+
				   			'<option value="2018">2018</option>'+
				   			'<option value="2019">2019</option>'+
				   			'<option value="2020">2020</option>'+
				      	'</select>'+
	               '</div>'+
	               '<div class="col-md-6">'+
	                  '<label>Ano de Conclusão</label>'+
							'<select id="ano_conclusao" name="ano_conclusao" class="campo_escolaridade form-control validate-stepper">'+
				    			'<option value="">Selecionar</option>'+
				    			'<option value="2015">2015</option>'+
					   			'<option value="2016">2016</option>'+
					   			'<option value="2017">2017</option>'+
					   			'<option value="2018">2018</option>'+
					   			'<option value="2019">2019</option>'+
					   			'<option value="2020">2020</option>'+
			     			'</select>'+
	               '</div>'+
	          	'</div>'+
	      	'</div>'+
				'<div class="row">'+
					'<div class="col-md-12 text-right">'+
						'<div class="remove_escolaridade btn btn-danger" style="border-radius: 30px;">-</div>'+
						'<div class="add_escolaridade btn btn-primary" style="border-radius: 30px;">+</div>'+
					'</div>'+
				'</div>'+
			'</div>';

		$("#div_escolaridade").append(html);
		$(this).hide();
	});

	$(document).on('click','.remove_escolaridade', function() {
		$(this).closest('.dados-escolaridade').remove();

		if($('.dados-escolaridade').length == 1)
			$(".add_escolaridade").show();
	});

	$( "#btnCadastro" ).click(function() {
		var sendData = {};

		// ------------- pega todas as escolaridades -------------
		var escolaridades = [];
		var aux = [];

		$(".dados-escolaridade").each(function() {
			aux = [];
			$(this).find('.campo_escolaridade').each(function() {
				aux.push($(this).val());
			});
			escolaridades.push(aux);
		});
		// ------------------------------------------------------

		sendData.escolaridade = escolaridades;
		sendData.nome = $("#nome").val();
		sendData.telefone = $("#telefone").val();
		sendData.sexo = $("#sexo").val();
		sendData.data_nascimento = $("#data_nascimento").val(); 
		sendData.cidade = $("#cidade").val(); 
		sendData.estado = $("#estado").val(); 
		sendData.instagram = $("#instagram").val(); 
		sendData.twitter = $("#twitter").val(); 
		sendData.facebook = $("#facebook").val();  
		sendData.linkedin = '';
		sendData.github = $("#github").val();  
		sendData.email = $("#email").val();
		sendData.senha = $("#senha").val();
		sendData.senha_confirm = $("#senha_confirm").val();

		if(sendData.senha && sendData.senha_confirm && (sendData.senha == sendData.senha_confirm)) {
			$.ajax({
		    	type:"POST",
		        cache:false,
		        url:"<?=site_url('Cadastro/cadastrar')?>",
		        data:sendData,
		        success: function () {
	        		$("#cadastro-ok").removeAttr('hidden');
		        },
		        error: function () {
	        		$("#cadastro-erro").removeAttr('hidden');
			    }
		   	});
		}

	});
	
</script>
<script>
	$(function() {
		$('#estado').change(function() {
			var estado = $(this).val(); 
			$('#cidade').children().remove();
	
			if (estado != '') {
				$.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + estado + '/distritos', function(data) {
					$.each(data, function(indice, valor) {
						$('#cidade').append('<option value="' + valor.nome + '">' + valor.nome + '</option>');
					});
				})
			}
		})
	}, (jQuery));
</script>
