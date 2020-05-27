<section class="py-5">
	<div class="container-fluid px-5">
		<div class="row pt-3">
			<div class="col-md-3 mb-5">
				<div class="mb-4">
					<img src="<?=(!empty($usuario['imagem']) ? base_url('/assets/imagens/usuarios/').$this->session->userdata('id').'/'.$usuario['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>" width="100%" style="border: 1px solid #ddd; padding: 5px;">
				</div>
				<ul class="list-group">
				  <li class="list-group-item"><a href="<?=site_url('perfil')?>">Ver Perfil</a></li>
				  <li class="list-group-item"><a href="<?=site_url('perfil/alterar_perfil/').$this->session->userdata('id')?>">Alterar Perfil</a></li>
				  <li class="list-group-item active"><a href="<?=site_url('perfil/projetos')?>" class="text-white">Meus Projetos</a></li>
				  <li class="list-group-item"><a href="<?=site_url('projeto/criar_projeto')?>">Criar Projeto</a></li>
				  <li class="list-group-item"><a href="<?=site_url('inicio/sair')?>">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<div class="row mb-5 justify-content-end">
					<div class="col-md-3">
						<a href="<?=site_url('projeto/criar_projeto')?>" class="btn btn-success btn-block" role="button">Criar Projeto +</a>
					</div>
				</div>

				<?php if(isset($projetos) && !empty($projetos)):?>
					<?php foreach($projetos as $p):?>
						<div class="row mb-5">
							<div class="col-md-4">
								<img src="<?=(!empty($p['imagem']) ? base_url('assets/imagens/usuarios/'.$p['id_usuario'].'/projetos/'.$p['imagem']) : base_url('assets/imagens/projeto_default.png'))?>" class="img-thumbnail" width="100%">
							</div>
							<div class="col-md-8">
								<a href="<?=site_url('projeto/visualizar/'.$p['id_projeto'])?>"><h3><?=$p['titulo']?></h3></a>
								<p><i><?=$p['descricao']?></i></p>
								<a href="#" class="btn btn-warning mr-1" role="button" style="border-radius: 0px;">Área de Atuação</a> <a href="categoria.php" class="btn btn-warning" role="button" style="border-radius: 0px;">Área de Atuação</a>
							</div>
						</div>
					<?php endforeach;?>
				<?php else:?>
					<div class="row mb-5">
						Você não possui nenhum projeto.
					</div>
				<?php endif;?>

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