<section class="py-5">
	<div class="container-fluid px-5">
		<div class="row pt-3">
			<div class="col-md-10 mb-5">
				<div class="row">
					<div class="col-md-4">
						<div class="img-thumbnail mb-2">
							<div class="foto-projeto" style="background-image: url('<?=(!empty($projeto['imagem_projeto']) ? base_url('assets/imagens/usuarios/'.$projeto['id_usuario'].'/projetos/'.$projeto['imagem_projeto']) : base_url('assets/imagens/projeto_default.png') )?>'); height: 240px;"></div>
						</div>
					</div>
					<div class="col-md-8">
						<div>
							<div class="row">
								<div class="col-md-9">
									<h2><?=$projeto['titulo']?></h2>
								</div>
								<div class="col-md-3 text-lg-right">
									<?=(!in_array($projeto['status'], array('Executando', 'Finalizado')) && $projeto['id_usuario'] == $this->session->userdata('id') ? '<a href="'.site_url('projeto/editar_projeto/'.$projeto['id_projeto']).'"><button class="btn btn-primary btn-block">Editar</button></a>' : '')?>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<p class="mb-1"><small>Participantes: <button class="btn btn-primary btn-sm"> <?=(!empty($participantes) ? $participantes['qtd'] : 0)?> / <?=$projeto['num_pessoas']?> </button></small></p>
									<p><small>Status: <button class="btn btn-success btn-sm"> <?=$projeto['status']?> </button></small></p>
								</div>
								<div class="col-md-6 text-lg-right">
									<?php if($projeto['status'] == 'Executando' && $projeto['id_usuario'] == $this->session->userdata('id')): ?>
									
										<button class="btn btn-danger" data-toggle="modal" data-target="#rating" id="btnFinalizar" data-projeto="<?=$projeto['id_projeto']?>">Finalizar Projeto</button>

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
												<h5 class="text-primary font-weight-bold text-center">Avalie seus colegas de equipe</h5>
												<p class="text-center">Antes de finalizar seu projeto, avalie com uma nota de 1 a 5 os seguintes participantes do seu projeto:</p>
												<form action="<?=site_url('projeto/finalizar/'.$projeto['id_projeto'])?>" method="POST">
													<div id="usuariosProjeto">

													</div>
													<button class="btn btn-primary btn-block btn-lg mt-2">Finalizar</button>
												</form>

												</div>
										      </div>
										    </div>
										  </div>
										</div>

									<?php endif;?>
								</div>
							</div>
							

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
							<div class="row">
								<div class="col-md-6">
									<?php if($this->session->userdata('id') != $projeto['id_usuario'] && $participantes['qtd'] != $projeto['num_pessoas'] && $this->session->userdata('logado')):?>
										<?php if($projetoPart):?>
											<a href="<?=site_url('projeto/cancelar/'.$projeto['id_projeto'])?>" class="btn btn-danger" role="button">Cancelar Solicitação</a>
										<?php else:?>
											<a href="<?=site_url('projeto/participar/'.$projeto['id_projeto'])?>" class="btn btn-primary" role="button">Solicitar Participação +</a>
										<?php endif;?>
									<?php endif;?>
								</div>
								<div class="col-lg-6">
									<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#chat">
									    Chat <i class="fas fa-comments mr-1"></i>
									</button>

									<!-- Chat Modal -->
										<div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="chatModal" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content pb-3" style="border-radius: 0.5rem;">
										      <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										      </div>
										      <div class="modal-body pt-0">
											<h3 class="font-weight-bold text-center text-primary">Chat</h3>
											<div style="width: auto; height: 200px; border: 2px solid #e3e7f0; border-radius: 10px; padding: 30px 20px;">
												<p>Aqui vão as mensagens</p>
											</div>
											<form class="mt-4">
												  <div class="form-row">
													<div class="col-10">
													<input type="text" class="form-control" name="" placeholder="Digite sua mensagem...">
												    </div>
												    <div class="col-2">
													    <button class="btn btn-primary btn-block">
													  <i class="fas fa-paper-plane"></i>
													</button>
												    </div>
												  </div>
												</form>
										      </div>
										    </div>
										  </div>
										</div>
									<!-- /Chat Modal -->
								</div>
							</div>

						</div>
					</div>
				</div>

				<?php if($this->session->userdata('id') != $projeto['id_usuario']):?>
					<div class="row mt-3">
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
									<div class="img-thumbnail mb-2">
										<div class="foto-projeto-index" style="background-image: url('<?=(!empty($pr['imagem']) ? base_url('/assets/imagens/usuarios/').$pr['fk_p_usuario'].'/projetos/'.$pr['imagem'] : base_url('/assets/imagens/projeto_default.png'))?>');"></div>
									</div>
									<span class="mt-2" style="font-size: 14px;"><?=(strlen($pr['descricao']) > 200 ? substr($pr['descricao'], 0, 200).'...' : $pr['descricao'] )?></span>
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
					<div class="row mt-3">
						<div class="col-12 pt-5">
							<h3>Solicitações:</h3>
							<hr>
						</div>
					</div>
					<div class="row mt-2">
						<?php if(isset($solicitacoes) && !empty($solicitacoes)):?>
							<?php foreach($solicitacoes as $s):?>
								<div class="col-md-3 col-6 text-center">
									<span style="font-size: 16px;"><a href='<?=site_url('perfil/index/'.$s['id_usuario'])?>'><?=$s['nome']?></a> </span><br>
									<div class="img-thumbnail mt-1 mb-2">
										<div class="foto-pequena" style="background-image: url('<?=(!empty($s['imagem']) ? base_url('/assets/imagens/usuarios/').$s['id_usuario'].'/'.$s['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>'); height: 150px;"></div>
									</div>
									<a href="<?=site_url('projeto/aceitar/'.$projeto['id_projeto'].'/'.$s['id_usuario'])?>" class="btn btn-primary form-control mb-2"><i class="fas fa-check mr-1"></i> Aceitar</a>
									<a href="<?=site_url('projeto/recusar/'.$projeto['id_projeto'].'/'.$s['id_usuario'])?>" class="btn btn-danger form-control"><i class="fas fa-times mr-1"></i> Recusar</a>
								</div>
							<?php endforeach;?>
						<?php else:?>
							<div class="col-12">
								<i>Esse projeto ainda não possui nenhuma solicitação de participação.</i>
							</div>
						<?php endif;?>

					</div>
				<?php endif;?>

			</div>

			<div class="col-md-2 text-center">
				<span style="font-size: 14px;">Projeto criado por <br> <?=($this->session->userdata('id') != $projeto['id_usuario'] ? "<a href='<?=site_url('perfil/index/'".$projeto['id_usuario'].")?>".$projeto['nome']."</a>" : $projeto['nome'] )?> </span><br>
				<div class="img-thumbnail mt-1 mb-2">
					<div class="foto-pequena" style="background-image: url('<?=(!empty($projeto['imagem']) ? base_url('/assets/imagens/usuarios/').$projeto['id_usuario'].'/'.$projeto['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>'); height: 160px;"></div>
				</div>
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
