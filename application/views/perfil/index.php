<section>
<div class="container py-5 mt-2 mb-5">
	<div class="row justify-content-center">
		<div class="col-md-3 col-5 mb-5">
			<div class="img-thumbnail mb-2">
        		<div class="foto-perfil" style="background-image: url('<?=(!empty($usuario['imagem']) ? base_url('/assets/imagens/usuarios/').$usuario['id_usuario'].'/'.$usuario['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>');"></div>
        	</div>
			<?php if($usuario['id_usuario'] == $this->session->userdata('id')):?>
				<ul class="list-group">
				  <li class="list-group-item active"><a href="<?=site_url('perfil')?>" class="text-white">Ver Perfil</a></li>
				  <li class="list-group-item"><a href="<?=site_url('perfil/alterar_perfil/').$this->session->userdata('id')?>">Alterar Perfil</a></li>
				  <li class="list-group-item"><a href="<?=site_url('perfil/projetos')?>">Meus Projetos</a></li>
				  <li class="list-group-item"><a href="<?=site_url('solicitacao')?>">Solicitações</a></li>
				  <li class="list-group-item"><a href="<?=site_url('projeto/criar_projeto')?>">Criar Projeto</a></li>
				  <li class="list-group-item"><a href="<?=site_url('inicio/sair')?>">Sair</a></li>
				</ul>
			<?php endif;?>
		</div>
		<div class="col-md-9 col-7">
			<div class="mb-5">
				<?php if(has_alert()): ?>
			      <?php foreach(has_alert() as $type => $message): ?>  
					   <div class="alert alert-dismissible <?php echo $type; ?>">  
					      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
						      <?php echo $message; ?>  
						</div>
				   <?php endforeach; ?>  
				<?php endif; ?>
				<div class="row">
					<div class="col-6">
						<h4 class="text-primary"><b><?=$usuario['nome']?></b>, <?=$usuario['idade']?></h4>
					</div>
					<div class="col-md-6 text-lg-right">
						<a href="<?=site_url('ranking')?>" class="btn btn-primary btn-sm" role="button">Posição no Ranking: <b><?=($usuario['pontuacao'] <= 0 ? '-' : $usuario['posicao_rank'] )?></b></a>
					</div>
				</div>
				<hr>
				<p><i><?=(!empty($usuario['biografia']) ? $usuario['biografia'] : 'Biografia')?></i></p>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<p><i><i class="fas fa-map-marker-alt"></i> <?=$usuario['cidade']?> / <?=$usuario['estado']?></i></p>
					</div>
					<div class="col-md-5 text-lg-center">
						<p><i><i class="fas fa-envelope"></i> <?=$usuario['email']?></i></p>
					</div>
					<div class="col-md-3 text-lg-right">
						<p><i><i class="fas fa-phone"></i> <?=$usuario['telefone']?></i></p>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12 text-right">
						<h5>
							<?php if(!empty($usuario['instagram'])):?>
								<a href="https://www.instagram.com/<?=$usuario['instagram']?>" target="_blank" class="px-2"><i class="fab fa-instagram fa-lg"></i></a>
							<?php endif;?>
							<?php if(!empty($usuario['twitter'])):?>
								<a href="https://twitter.com/<?=$usuario['twitter']?>" target="_blank" class="px-2"><i class="fab fa-twitter fa-lg"></i></a>
							<?php endif;?>
							<?php if(!empty($usuario['facebook'])):?>
								<a href="https://www.facebook.com/<?=$usuario['facebook']?>" target="_blank" class="px-2"><i class="fab fa-facebook-f fa-lg"></i></a>
							<?php endif;?>
							<?php if(!empty($usuario['github'])):?>
								<a href="https://github.com/<?=$usuario['github']?>" target="_blank" class="px-2"><i class="fab fa-github fa-lg"></i></a>
							<?php endif;?>
						</h5>
					</div>
				</div>
			</div>
			<div>
				<h4 class="text-primary font-weight-bold">Formação Acadêmica</h4>
				<?php if(isset($escolaridade) && !empty($escolaridade)):?>
					<?php foreach($escolaridade as $esc):?>
						<hr>
						<article>
							<div class="row mt-3">
								<div class="col-md-6 mb-3 mb-lg-0">
									<h6 style="font-size: 12px;">Nível de Escolaridade</h6>
									<h5><?=$esc['tipo']?></h5>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-6 mb-3 mb-lg-0">
									<h6 style="font-size: 12px;">Curso</h6>
									<h5><?=$esc['curso']?></h5>
								</div>
								<div class="col-md-6 text-lg-right">
									<div class="row justify-content-end">
										<div class="col-md-3 col-6">
											<h6 style="font-size: 12px;">Início</h6>
											<h5><?=$esc['ano_inicio']?></h5>
										</div>
										<div class="col-md-3 col-6">
											<h6 style="font-size: 12px;">Conclusão</h6>
											<h5><?=$esc['ano_fim']?></h5>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-6">
									<h6 style="font-size: 12px;">Instituição</h6>
									<h5><?=$esc['instituicao']?></h5>
								</div>
								<?php if($usuario['id_usuario'] == $this->session->userdata('id')):?>
									<div class="col-md-6 text-lg-right">
										<button type="button" class="btn btn-primary btn-sm px-3 mt-3 btnAlterar" data-escolaridade="<?=$esc['id_escolaridade']?>" data-toggle="modal" data-target="#alteracao">
										    <span style="font-size: 14px;">Alterar</span>
										</button>
										<button type="button" class="btn btn-danger btn-sm px-3 mt-3 btnRemover" data-escolaridade="<?=$esc['id_escolaridade']?>">
										    <span style="font-size: 14px;">Remover</span>
										</button>
									</div>
								<?php endif;?>
							</div>
						</article>
					<?php endforeach;?>
				<?php else:?>
					<i>Você não possui nenhuma formação acadêmica</i>
				<?php endif;?>

				<?php if($usuario['id_usuario'] == $this->session->userdata('id')):?>
					<div class="row mt-3">
						<div class="col-md-12 text-right">
							<button class="btn btn-primary" style="border-radius: 30px;" data-toggle="modal" data-target="#addFormacao">+</button>
						</div>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
</section>
<!-- Modal Alterar Formacao Academica -->
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
	        <div id="escolaridade">
	        </div>
		</div>	
      </div>
    </div>
  </div>
</div>
<!-- /Modal Alterar Formacao Academica -->

<!-- Modal Add Formacao Academica -->
<div class="modal fade" id="addFormacao" tabindex="-1" role="dialog" aria-labelledby="addFormacao" aria-hidden="true">
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
				<form class="mt-4" action="<?=site_url('perfil/add_escolaridade')?>" method="post">
				  <div class="form-group">
				    <label for="nivel-escolaridade">Nível de Escolaridade</label>
				    <select name="nivel-escolaridade" class="form-control" required="required">
				      <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
				      <option value="Ensino Médio Completo">Ensino Médio Completo</option>
				      <option value="Superior Incompleto">Superior Incompleto</option>
				      <option value="Superior Completo">Superior Completo</option>
				      <option value="Cursando Técnico">Cursando Técnico</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="curso">Curso</label>
				    <input type="text" class="form-control" id="curso" name="curso" required="required">
				  </div>
				  <div class="form-group">
				    <label for="instituicao">Instituição</label>
				    <input type="text" class="form-control" id="instituicao" name="instituicao" required="required">
				  </div>
				  <div class="form-group">
				  	<div class="form-row">
				  		<div class="col-6">
				    		<label for="ano_inicio">Ano de Início</label>
				    		<select name="ano_inicio" class="form-control" required="required">
				    			<option value="">Selecionar</option>
					   			<option value="2000">2000</option>
					   			<option value="2001">2001</option>
					   			<option value="2002">2002</option>
					   			<option value="2003">2003</option>
					   			<option value="2004">2004</option>
					   			<option value="2005">2005</option>
					   			<option value="2006">2006</option>
					   			<option value="2007">2007</option>
					   			<option value="2008">2008</option>
					   			<option value="2009">2009</option>
					   			<option value="2010">2010</option>
					   			<option value="2011">2011</option>
					   			<option value="2012">2012</option>
					   			<option value="2013">2013</option>
					   			<option value="2014">2014</option>
					   			<option value="2015">2015</option>
					   			<option value="2016">2016</option>
					   			<option value="2017">2017</option>
					   			<option value="2018">2018</option>
					   			<option value="2019">2019</option>
					   			<option value="2020">2020</option>
				    		</select>
				    	</div>
				    	<div class="col-6">
				    		<label for="ano_fim">Ano de Conclusão</label>
				    		<select name="ano_fim" class="form-control" required="required">
				    			<option value="">Selecionar</option>
					   			<option value="2000">2000</option>
					   			<option value="2001">2001</option>
					   			<option value="2002">2002</option>
					   			<option value="2003">2003</option>
					   			<option value="2004">2004</option>
					   			<option value="2005">2005</option>
					   			<option value="2006">2006</option>
					   			<option value="2007">2007</option>
					   			<option value="2008">2008</option>
					   			<option value="2009">2009</option>
					   			<option value="2010">2010</option>
					   			<option value="2011">2011</option>
					   			<option value="2012">2012</option>
					   			<option value="2013">2013</option>
					   			<option value="2014">2014</option>
					   			<option value="2015">2015</option>
					   			<option value="2016">2016</option>
					   			<option value="2017">2017</option>
					   			<option value="2018">2018</option>
					   			<option value="2019">2019</option>
					   			<option value="2020">2020</option>
					   			<option value="2021">2021</option>
					   			<option value="2022">2022</option>
					   			<option value="2023">2023</option>
					   			<option value="2024">2024</option>
					   			<option value="2025">2025</option>
					   			<option value="2026">2026</option>
					   			<option value="2027">2027</option>
					   			<option value="2028">2028</option>
					   			<option value="2029">2029</option>
					   			<option value="2030">2030</option>
				    		</select>
				    	</div>
				    </div>
				  </div>
				  <center><input type="submit" name="botao_adicionar" class="btn btn-primary btn-block btn-lg" value="Adicionar" style="font-size: 16px;"></center>
				</form>
		</div>	
      </div>
    </div>
  </div>
</div>
<!-- /Modal Alterar Formacao Academica -->

<script type="text/javascript">
$(".btnAlterar").click(function() {
	var id = $(this).data('escolaridade');
	$("#escolaridade").load('<?=site_url('perfil/getEscolaridade/')?>'+id);
});
</script>
