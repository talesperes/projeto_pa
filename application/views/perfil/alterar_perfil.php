<section>
<div class="container py-5 mt-2 mb-5">
	<div class="row justify-content-center">
		<div class="col-md-3 col-5 mb-5">
			<div class="img-thumbnail mb-2">
        		<div class="foto-perfil" style="background-image: url('<?=(!empty($usuario['imagem']) ? base_url('/assets/imagens/usuarios/').$usuario['id_usuario'].'/'.$usuario['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>');"></div>
        	</div>
				<ul class="list-group">
				  <li class="list-group-item"><a href="<?=site_url('perfil')?>">Ver Perfil</a></li>
				  <li class="list-group-item active"><a href="<?=site_url('perfil/alterar_perfil/').$this->session->userdata('id')?>" class="text-white">Alterar Perfil</a></li>
				  <li class="list-group-item"><a href="<?=site_url('perfil/projetos')?>">Meus Projetos</a></li>
				  <li class="list-group-item"><a href="<?=site_url('solicitacao')?>">Solicitações</a></li>
				  <li class="list-group-item"><a href="<?=site_url('projeto/criar_projeto')?>">Criar Projeto</a></li>
				  <li class="list-group-item"><a href="<?=site_url('inicio/sair')?>">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-9 col-7">
				<form method="post" action="<?=site_url('perfil/alterar_perfil/'.$usuario['id_usuario'])?>" enctype="multipart/form-data">
					<?php if(has_alert()):  
				      foreach(has_alert() as $type => $message): ?>  
				   <div class="alert alert-dismissible <?php echo $type; ?>">  
				      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
				      <?php echo $message; ?>  
				   </div>
				   <?php endforeach;  
				      endif; ?>
				    <label>Alterar Foto de Perfil:</label>
				    <input type="file" name="img_perfil" id="img_perfil" class="form-control btn btn-warning">
					<div class="form-group">
	                    <h2 class="fs-title text-primary">Dados de Login</h2>
	                    <div class="form-group">
							<label>Email</label>
						    <input type="email" name="email" class="form-control" value="<?=$usuario['email']?>">						    
					    </div>
					    <div class="form-group">
							<label>Nova Senha</label>
						    <input type="password" name="senha" class="form-control">						    
					    </div>
					    <div class="form-group">
							<label>Confirme sua senha</label>
						    <input type="password" name="senha_confirm" class="form-control">						    
					    </div>
					</div>
					<div class="form-group">
						<h6 class="pt-4 text-primary font-weight-bold text-uppercase">Dados Pessoais</h6>
				    	<div class="form-row pt-2">
				    		<div class="col-md-6 mb-2">
                                <label>Nome Completo</label>
					    		<input type="text" name="nome" class="form-control" value="<?=$usuario['nome']?>">
                            </div>
                            <div class="col-md-6">
                                <label>Telefone</label>
					    		<input type="text" name="telefone" class="form-control" value="<?=$usuario['telefone']?>">		
                            </div>
                        </div>
                    </div>
				    <div class="form-group">
				    	<div class="form-row">
				    		<div class="col-md-6 mb-2">
                                <label>Sexo</label>
                                <select name="sexo" class="form-control">
                                	<option <?=($usuario['sexo'] == 'F' ? 'selected' : '')?> value="F">Feminino</option>
                                	<option <?=($usuario['sexo'] == 'M' ? 'selected' : '')?> value="M">Masculino</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Data de Nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control" value="<?=$usuario['nascimento']?>">
                                <div class="form-check text-right mt-1">
								  <input class="form-check-input" type="checkbox" name="exibir_idade" value="" checked>
								  <label class="form-check-label">
								    <small>Exibir minha idade para todos</small>
								  </label>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
	                    <h6 class="pt-4 text-primary font-weight-bold text-uppercase">Biografia</h6>
	                    <div class="form-group pt-2">
							<label>Insira uma breve descrição sobre você</label>
						    <textarea class="form-control" name="biografia" rows="6"><?=$usuario['biografia']?></textarea>						    
					    </div>
					</div>
                    <div class="form-group">
                    	<h6 class="pt-4 text-primary font-weight-bold text-uppercase">Localização</h6>
				    	<div class="form-row pt-2">
				    		<div class="col-8 mb-2">
                                <label>Cidade</label>
                                <select id="cidade" name="cidade" class="form-control validate-stepper">
                                 	<option value="">-</option>
                                 </select>
                            </div>
                            <div class="col-4">
                                <label>Estado</label>
                                <select id="estado" name="estado" class="form-control">
                                	<option <?=($usuario['estado'] == 'AL' ? 'selected' : '' )?> value="AL">Alagoas</option>
											<option <?=($usuario['estado'] == 'AP' ? 'selected' : '' )?> value="AP">Amapá</option>
											<option <?=($usuario['estado'] == 'AM' ? 'selected' : '' )?> value="AM">Amazonas</option>
											<option <?=($usuario['estado'] == 'BA' ? 'selected' : '' )?> value="BA">Bahia</option>
											<option <?=($usuario['estado'] == 'CE' ? 'selected' : '' )?> value="CE">Ceará</option>
											<option <?=($usuario['estado'] == 'DF' ? 'selected' : '' )?> value="DF">Distrito Federal</option>
											<option <?=($usuario['estado'] == 'ES' ? 'selected' : '' )?> value="ES">Espírito Santo</option>
											<option <?=($usuario['estado'] == 'GO' ? 'selected' : '' )?> value="GO">Goiás</option>
											<option <?=($usuario['estado'] == 'MA' ? 'selected' : '' )?> value="MA">Maranhão</option>
											<option <?=($usuario['estado'] == 'MT' ? 'selected' : '' )?> value="MT">Mato Grosso</option>
											<option <?=($usuario['estado'] == 'MS' ? 'selected' : '' )?> value="MS">Mato Grosso do Sul</option>
											<option <?=($usuario['estado'] == 'MG' ? 'selected' : '' )?> value="MG">Minas Gerais</option>
											<option <?=($usuario['estado'] == 'PA' ? 'selected' : '' )?> value="PA">Pará</option>
											<option <?=($usuario['estado'] == 'PB' ? 'selected' : '' )?> value="PB">Paraíba</option>
											<option <?=($usuario['estado'] == 'PR' ? 'selected' : '' )?> value="PR">Paraná</option>
											<option <?=($usuario['estado'] == 'PE' ? 'selected' : '' )?> value="PE">Pernambuco</option>
											<option <?=($usuario['estado'] == 'PI' ? 'selected' : '' )?> value="PI">Piauí</option>
											<option <?=($usuario['estado'] == 'RJ' ? 'selected' : '' )?> value="RJ">Rio de Janeiro</option>
											<option <?=($usuario['estado'] == 'RN' ? 'selected' : '' )?> value="RN">Rio Grande do Norte</option>
											<option <?=($usuario['estado'] == 'RS' ? 'selected' : '' )?> value="RS">Rio Grande do Sul</option>
											<option <?=($usuario['estado'] == 'RO' ? 'selected' : '' )?> value="RO">Rondônia</option>
											<option <?=($usuario['estado'] == 'RR' ? 'selected' : '' )?> value="RR">Roraima</option>
											<option <?=($usuario['estado'] == 'SC' ? 'selected' : '' )?> value="SC">Santa Catarina</option>
											<option <?=($usuario['estado'] == 'SP' ? 'selected' : '' )?> value="SP">São Paulo</option>
											<option <?=($usuario['estado'] == 'SE' ? 'selected' : '' )?> value="SE">Sergipe</option>
											<option <?=($usuario['estado'] == 'TO' ? 'selected' : '' )?> value="TO">Tocantins</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    	<h6 class="pt-4 text-primary font-weight-bold text-uppercase">Redes Sociais</h6>
				    	<div class="form-row pt-2">
				    		<div class="col-md-3 mb-2">
                                <label><i class="fab fa-instagram"></i> Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="<?=$usuario['instagram']?>">
                            </div>
                            <div class="col-md-3 mb-2">
                                <label><i class="fab fa-twitter"></i> Twitter</label>
                                <input type="text" name="twitter" class="form-control" value="<?=$usuario['twitter']?>">
                            </div>
                            <div class="col-md-3 mb-2">
                                <label><i class="fab fa-facebook-f"></i> Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="<?=$usuario['facebook']?>">
                            </div>
                            <div class="col-md-3">
                                <label><i class="fab fa-github"></i> GitHub</label>
                                <input type="text" name="github" class="form-control" value="<?=$usuario['github']?>">
                            </div>
                        </div>
                    </div>
				    <input type="submit" value="Alterar" name="submit" class="btn btn-primary btn-block">
				</form>
			</div>
		</div>
	</div>
</section>

<!-- Modal Alterar Instituição -->
<div class="modal fade" id="alteracao" tabindex="-1" role="dialog" aria-labelledby="alteracao" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content pb-3" style="border-radius: 0.5rem;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div style="border: 2px solid #e3e7f0; border-radius: 10px; padding: 30px 20px; margin: 0px 20px;">
	        <h3 class="font-weight-bold text-center text-primary">Formação Acadêmica</h3>
	        <form class="mt-4">
        	  <div class="form-group">
			    <label for="curso">Curso</label>
			    <input type="text" class="form-control" id="curso" name="curso">
			  </div>
			  <div class="form-group">
			    <label for="instituicao">Instituição</label>
			    <input type="text" class="form-control" id="instituicao" name="instituicao">
			  </div>
			  <div class="form-group">
			  	<div class="form-row">
			  		<div class="col-6">
			    		<label for="ano_inicio">Ano de Início</label>
			    		<select name="ano_inicio" class="form-control">
			    			<option value=""></option>
			    		</select>
			    	</div>
			    	<div class="col-6">
			    		<label for="ano_conclusao">Ano de Conclusão</label>
			    		<select name="ano_conclusao" class="form-control">
			    			<option value=""></option>
			    		</select>
			    	</div>
			    </div>
			  </div>
			  <center><input type="submit" name="botao_alterar" class="btn btn-primary btn-block btn-lg" value="Alterar" style="font-size: 16px;"></center>
			</form>
		</div>	
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {

	var estado = $("#estado").val();
	var cidade = '<?=$usuario['cidade']?>';

	$.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + estado + '/distritos', function(data) {
		$.each(data, function(indice, valor) {

			if(valor.nome == cidade){
				$('#cidade').append('<option selected value="' + valor.nome + '">' + valor.nome + '</option>');
			} else {
				$('#cidade').append('<option value="' + valor.nome + '">' + valor.nome + '</option>');
			}

		});
	})

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