<section>
	<div class="container py-5 mt-2 mb-5">
		<div class="row justify-content-center">
			<div class="col-md-3 col-5 mb-5">
				<div class="img-thumbnail mb-2">
		    		<div class="foto-perfil" style="background-image: url('<?=(!empty($usuario['imagem']) ? base_url('/assets/imagens/usuarios/').$usuario['id_usuario'].'/'.$usuario['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>');"></div>
		    	</div>
				<?php if($usuario['id_usuario'] == $this->session->userdata('id')):?>
					<ul class="list-group">
					  <li class="list-group-item"><a href="<?=site_url('perfil')?>">Ver Perfil</a></li>
					  <li class="list-group-item"><a href="<?=site_url('perfil/alterar_perfil/').$this->session->userdata('id')?>">Alterar Perfil</a></li>
					  <li class="list-group-item"><a href="<?=site_url('perfil/projetos')?>">Meus Projetos</a></li>
					  <li class="list-group-item active"><a href="<?=site_url('solicitacao')?>" class="text-white">Solicitações</a></li>
					  <li class="list-group-item"><a href="<?=site_url('projeto/criar_projeto')?>">Criar Projeto</a></li>
					  <li class="list-group-item"><a href="<?=site_url('inicio/sair')?>">Sair</a></li>
					</ul>
				<?php endif;?>
			</div>
			<div class="col-md-9 col-7">
				<div class="row mb-5">
					<div class="col-12">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="sobre-tab" data-toggle="tab" href="#sol_abertas" role="tab" aria-controls="sol_abertas" aria-selected="true">Solicitações Abertas</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="formacao-tab" data-toggle="tab" href="#sol_aceitas" role="tab" aria-controls="sol_aceitas" aria-selected="false">Solicitações Aceitas</a>
						  </li>
						</ul>
					</div>
				</div>
				<div class="mb-5">
					<div class="tab-content" id="myTabContent">
						<?php if(has_alert()): ?>
					      <?php foreach(has_alert() as $type => $message): ?>  
							   <div class="alert alert-dismissible <?php echo $type; ?>">  
							      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
								      <?php echo $message; ?>  
								</div>
						   <?php endforeach; ?>  
						<?php endif; ?>
					  	<div class="tab-pane fade show active" id="sol_abertas" role="tabpanel" aria-labelledby="sol_abertas">
					  		<?php if(isset($solicitacoes) && !empty($solicitacoes)):?>
					  			<?php foreach($solicitacoes as $s):?>
							  		<div class="row">
								  		<div class="col-md-3">
											<div class="img-thumbnail mb-2">
								        		<div class="foto-pequena" style="background-image: url('<?=(!empty($s['imagem']) ? base_url('/assets/imagens/usuarios/').$s['id_usuario'].'/'.$s['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>');"></div>
								        	</div>
										</div>
										<div class="col-md-9">
											<a href="<?=site_url('perfil/index/'.$s['id_usuario'])?>"><h5><?=$s['nome']?></h5></a>
											<p class="mb-0"><i><?=$s['biografia']?></i></p>
											<p class="mb-2"><small>Solicitou participação no projeto <a href="<?=site_url('projeto/visualizar/'.$s['id_projeto'])?>"><?=$s['titulo']?></a></small></p>
											<div class="row">
												<div class="col-md-3 mb-2">
													<a href="<?=site_url('projeto/aceitar/'.$s['id_projeto'].'/'.$s['id_usuario'].'/'.'1')?>" class="btn btn-success btn-block" role="button"><i class="fas fa-check mr-1"></i> Aceitar</a>
												</div>
												<div class="col-md-3 mb-2">
													<a href="<?=site_url('projeto/recusar/'.$s['id_projeto'].'/'.$s['id_usuario'].'/'.'1')?>" class="btn btn-danger btn-block" role="button"><i class="fas fa-times mr-1"></i> Recusar</a>
												</div>
											</div>							  
										</div>
									</div>
								<?php endforeach;?>
							<?php endif;?>
					  	</div>
					  	<div class="tab-pane fade" id="sol_aceitas" role="tabpanel" aria-labelledby="sol_aceitas">
					  		<div class="row">
						  		<div class="col-md-3">
									<div class="img-thumbnail mb-2">
						        		<div class="foto-pequena" style="background-image: url('imagens/foto_perfil.jpg');"></div>
						        	</div>
								</div>
								<div class="col-md-9">
									<a href="perfil.php"><h5>Nome Usuário</h5></a>
									<p class="mb-2">Participa do projeto <a href="projeto.php">Nome Projeto</a></p>
									<div class="row">
										<div class="col-md-6 mb-2">
											<a href="categoria.php" class="btn btn-primary btn-block" role="button"><i class="fas fa-comments mr-1"></i> Chat</a>
										</div>
										<div class="col-md-6 mb-2">
											<a href="categoria.php" class="btn btn-danger btn-block" role="button"><i class="fas fa-times mr-1"></i> Remover participante</a>
										</div>
									</div>							  
								</div>
							</div>
					  	</div>
					</div>				
				</div>
				<div class="row">
					<div class="col-12">
						<nav>
						  <?=$links?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>