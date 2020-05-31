<section>
<div class="container py-5 mt-2 mb-5">
	<div class="row justify-content-center">
		<div class="col-md-3 col-5 mb-5">
			<div class="img-thumbnail mb-2">
        		<div class="foto-perfil" style="background-image: url('<?=(!empty($usuario['imagem']) ? base_url('/assets/imagens/usuarios/').$this->session->userdata('id').'/'.$usuario['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>');"></div>
        	</div>
			<?php if($usuario['id_usuario'] == $this->session->userdata('id')):?>
				<ul class="list-group">
				  <li class="list-group-item active"><a href="<?=site_url('perfil')?>" class="text-white">Ver Perfil</a></li>
				  <li class="list-group-item"><a href="<?=site_url('perfil/alterar_perfil/').$this->session->userdata('id')?>">Alterar Perfil</a></li>
				  <li class="list-group-item"><a href="<?=site_url('perfil/projetos')?>">Meus Projetos</a></li>
				  <li class="list-group-item"><a href="<?=site_url('projeto/criar_projeto')?>">Criar Projeto</a></li>
				  <li class="list-group-item"><a href="<?=site_url('inicio/sair')?>">Sair</a></li>
				</ul>
			<?php endif;?>
		</div>
		<div class="col-md-9 col-7">
			<div class="mb-5">
				<div class="row">
					<div class="col-6">
						<h4 class="text-primary"><b><?=$usuario['nome']?></b>, <?=$usuario['idade']?></h4>
					</div>
					<div class="col-md-6 text-lg-right">
						<a href="<?=site_url('ranking')?>" class="btn btn-primary btn-sm" role="button">Posição no Ranking: <b><?=$usuario['posicao_rank']?></b></a>
					</div>
				</div>
				<hr>
				<p><i><?=(!empty($usuario['biografia']) ? $usuario['biografia'] : 'Biografia')?></i></p>
				<hr>
				<div class="row">
					<div class="col-4">
						<p><i><i class="fas fa-map-marker-alt"></i> <?=$usuario['cidade']?> / <?=$usuario['estado']?></i></p>
					</div>
					<div class="col-5 text-lg-center">
						<p><i><i class="fas fa-envelope"></i> <?=$usuario['email']?></i></p>
					</div>
					<div class="col-3 text-lg-right">
						<p><i><i class="fas fa-phone"></i> <?=$usuario['telefone']?></i></p>
					</div>
				</div>
			</div>
			<div>
				<h4 class="text-primary font-weight-bold">Formação Acadêmica</h4>
				<hr>
				<article>
					<div class="row">
						<div class="col-md-6 mb-3 mb-lg-0">
							<h6 style="font-size: 12px;">Curso</h6>
							<h5>Nome Curso</h5>
						</div>
						<div class="col-md-6 text-lg-right">
							<div class="row justify-content-end">
								<div class="col-md-3 col-6">
									<h6 style="font-size: 12px;">Início</h6>
									<h5>2000</h5>
								</div>
								<div class="col-md-3 col-6">
									<h6 style="font-size: 12px;">Conclusão</h6>
									<h5>2005</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							<h6 style="font-size: 12px;">Instituição</h6>
							<h5>Nome Instituição</h5>
						</div>
						<?php if($usuario['id_usuario'] == $this->session->userdata('id')):?>
							<div class="col-md-6 text-lg-right">
								<button type="button" class="btn btn-primary btn-sm px-3 mt-3" data-toggle="modal" data-target="#alteracao">
								    <span style="font-size: 14px;">Alterar</span>
								</button>
							</div>
						<?php endif;?>
					</div>
				</article>
				<hr>
				<article>
					<div class="row">
						<div class="col-md-6 mb-3 mb-lg-0">
							<h6 style="font-size: 12px;">Curso</h6>
							<h5>Nome Curso</h5>
						</div>
						<div class="col-md-6 text-lg-right">
							<div class="row justify-content-end">
								<div class="col-md-3 col-6">
									<h6 style="font-size: 12px;">Início</h6>
									<h5>2000</h5>
								</div>
								<div class="col-md-3 col-6">
									<h6 style="font-size: 12px;">Conclusão</h6>
									<h5>2005</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							<h6 style="font-size: 12px;">Instituição</h6>
							<h5>Nome Instituição</h5>
						</div>
						<?php if($usuario['id_usuario'] == $this->session->userdata('id')):?>
							<div class="col-md-6 text-lg-right">
								<button type="button" class="btn btn-primary btn-sm px-3 mt-3" data-toggle="modal" data-target="#alteracao">
								    <span style="font-size: 14px;">Alterar</span>
								</button>
							</div>
						<?php endif;?>
					</div>
				</article>
			</div>
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
<!-- /Modal Alterar Instituição -->