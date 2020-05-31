<section class="py-5">
	<div class="container-fluid px-5">
		<div class="row pt-3">
			<div class="col-md-10 mb-5">
				<div class="row">
					<div class="col-md-4">
						<div class="img-thumbnail mb-2">
							<div class="foto-projeto" style="background-image: url('<?=(!empty($projeto['imagem_projeto']) ? base_url('assets/imagens/usuarios/'.$projeto['id_usuario'].'/projetos/'.$projeto['imagem_projeto']) : base_url('assets/imagens/projeto_default.png') )?>');"></div>
						</div>
					</div>
					<div class="col-md-8">
						<div>
							<h2 class="mt-3"><?=$projeto['titulo']?> </h2>
							<p class="mb-1"><small>Participantes: <button class="btn btn-primary btn-sm"> <?=(!empty($participantes) ? $participantes['qtd'] : 0)?> / <?=$projeto['num_pessoas']?> </button></small></p>
							<p><small>Status: <button class="btn btn-warning btn-sm"> <?=$projeto['status']?> </button></small></p>
							
							<?php if($projeto['status'] == 'Executando' && $projeto['id_usuario'] == $this->session->userdata('id')): ?>
								<br>
								<button class="btn btn-success" data-toggle="modal" data-target="#rating" id="btnFinalizar" data-projeto="<?=$projeto['id_projeto']?>"><small>Finalizar Projeto</small></button>

								<div class="modal fade" id="rating" tabindex="-1" role="dialog" aria-labelledby="ratingModal" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content pb-3" style="border-radius: 0.5rem;">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<div style="border: 2px solid #e3e7f0; border-radius: 10px; padding: 30px 20px; margin: 0px 20px;">
								      		<form action="<?=site_url('projeto/finalizar/'.$projeto['id_projeto'])?>" method="POST">
									      		<div id="usuariosProjeto">
									      			
									      		</div>
								      			<button class="btn btn-primary btn-block btn-lg">Finalizar</button>
								      		</form>

										</div>
								      </div>
								    </div>
								  </div>
								</div>

							<?php endif;?>

							<p class="mt-3">
								<?=$projeto['descricao']?>
							</p>

							<?php if(has_alert()): ?>
						      <?php foreach(has_alert() as $type => $message): ?>  
								   <div class="alert alert-dismissible <?php echo $type; ?>">  
								      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
									      <?php echo $message; ?>  
									</div>
							   <?php endforeach; ?>  
							<?php endif; ?>

							<?php if($this->session->userdata('id') != $projeto['id_usuario'] && $participantes['qtd'] != $projeto['num_pessoas'] && $this->session->userdata('logado')):?>
								<?php if($projetoPart):?>
									<a href="<?=site_url('projeto/cancelar/'.$projeto['id_projeto'])?>" class="btn btn-danger" role="button">Cancelar Solicitação</a>
								<?php else:?>
									<a href="<?=site_url('projeto/participar/'.$projeto['id_projeto'])?>" class="btn btn-primary" role="button">Solicitar Participação +</a>
								<?php endif;?>
							<?php endif;?>

						</div>
					</div>
				</div>

				<?php if($this->session->userdata('id') != $projeto['id_usuario']):?>
					<div class="row mt-5">
						<div class="col-12 pt-5">
							<h3>Projetos Relacionados:</h3>
							<hr>
						</div>
					</div>

					<?php if(isset($projetosRel) && !empty($projetosRel)):?>
						<div class="row mt-3">
							<?php foreach($projetosRel as $pr):?>
								<div class="col-md-3">
									<a href="<?=site_url('projeto/visualizar/').$pr['id_projeto']?>"><h4 class="mt-2"><?=$pr['titulo']?></h4></a>
									<img src="<?=(!empty($pr['imagem']) ? base_url('/assets/imagens/usuarios/').$pr['fk_p_usuario'].'/projetos/'.$pr['imagem'] : base_url('/assets/imagens/projeto_default.png'))?>" class="img-thumbnail" width="100%">
									<span class="mt-2" style="font-size: 14px;"><?=$pr['descricao']?></span>
								</div>
							<?php endforeach;?>
						</div>
					<?php endif;?>

					<div class="row mt-2">
						<div class="col-12 pt-5">
							<form class="form-inline" method="get" action="<?=site_url('projeto')?>">
							   <input class="form-control mr-3 w-75" type="text" name="search" placeholder="Pesquise por título, instituição ou área de conhecimento" aria-label="Procurar">
							   <button class="btn btn-primary no-hover" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
							</form>
						</div>
					</div>
				<?php elseif($participantes['qtd'] != $projeto['num_pessoas']):?>
					<div class="row mt-5">
						<div class="col-12 pt-5">
							<h3>Solicitações:</h3>
							<hr>
						</div>
					</div>
					<div class="row mt-2">
						<?php if(isset($solicitacoes) && !empty($solicitacoes)):?>
							<?php foreach($solicitacoes as $s):?>
								<div class="col-md-3 text-center">
									<span style="font-size: 14px;"><a href='#'><?=$s['nome']?></a> </span><br>
									<div class="img-thumbnail mb-2">
										<div class="foto-perfil" style="background-image: url('<?=(!empty($s['imagem']) ? base_url('/assets/imagens/usuarios/').$s['id_usuario'].'/'.$s['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>');"></div>
									</div>
									<a href="<?=site_url('projeto/aceitar/'.$projeto['id_projeto'].'/'.$s['id_usuario'])?>" class="btn btn-primary form-control mb-2"><i class="fas fa-check mr-1"></i> Aceitar</a>
									<a href="<?=site_url('projeto/recusar/'.$projeto['id_projeto'].'/'.$s['id_usuario'])?>" class="btn btn-danger form-control"><i class="fas fa-times mr-1"></i> Recusar</a>
								</div>
							<?php endforeach;?>
						<?php else:?>
							<i>Esse projeto ainda não possui nenhuma solicitação de participação.</i>
						<?php endif;?>

					</div>
				<?php endif;?>

			</div>

			<div class="col-md-2 text-center">
				<span style="font-size: 14px;">Projeto criado por <br> <?=($this->session->userdata('id') != $projeto['id_usuario'] ? "<a href='<?=site_url('perfil/index/'".$projeto['id_usuario'].")?>".$projeto['nome']."</a>" : $projeto['nome'] )?> </span><br>
				<img src="<?=(!empty($projeto['imagem']) ? base_url('/assets/imagens/usuarios/').$projeto['id_usuario'].'/'.$projeto['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>" class="img-thumbnail my-2" width="100"><br>
				<?php if($this->session->userdata('id') != $projeto['id_usuario']):?>
					<span style="font-size: 14px;">Mais sobre o autor</span>
					<div class="p-2 mt-1" style="border: 1px solid #ddd;">
						<p class="mt-3" style="font-size: 12px;">
							<?=(!empty($projeto['biografia']) ? $projeto['biografia'] : 'Autor sem biografia.' )?>
						</p>
						<a href="<?=site_url('perfil/index/'.$projeto['id_usuario'])?>">Visitar Perfil</a>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$("#btnFinalizar").click(function() {
		var id = $(this).data('projeto');
		$("#usuariosProjeto").load('<?=site_url('projeto/getUsuarios/')?>'+id);
	});
</script>
