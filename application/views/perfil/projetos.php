<section class="py-5">
	<div class="container-fluid px-5">
		<div class="row pt-3">
			<div class="col-md-3 mb-5">
				<div class="mb-4">
					<img src="<?=base_url('assets/imagens/foto_usuario.png')?>" width="100%" style="border: 1px solid #ddd; padding: 5px;">
				</div>
				<ul class="list-group">
				  <li class="list-group-item active"><a href="<?=site_url('perfil')?>" class="text-white">Ver Perfil</a></li>
				  <li class="list-group-item"><a href="<?=site_url('perfil')?>">Alterar Perfil</a></li>
				  <li class="list-group-item"><a href="<?=site_url('perfil/projetos')?>">Meus Projetos</a></li>
				  <li class="list-group-item"><a href="<?=site_url('perfil')?>">Criar Projeto</a></li>
				  <li class="list-group-item"><a href="<?=site_url('inicio/sair')?>">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<div class="row mb-5 justify-content-end">
					<div class="col-md-3">
						<a href="criar_projeto.php" class="btn btn-success btn-block" role="button">Criar Projeto +</a>
					</div>
				</div>

				<?php if(isset($projetos) && !empty($projetos)):?>
					<?php foreach($projetos as $p):?>
						<div class="row mb-5">
							<div class="col-md-4">
								<img src="<?=base_url('assets/imagens/projeto_01.jpg')?>" class="img-thumbnail" width="100%">
							</div>
							<div class="col-md-8">
								<a href="projeto.php"><h3><?=$p['titulo']?></h3></a>
								<p><i><?=$p['descricao']?></i></p>
								<a href="categoria.php" class="btn btn-warning mr-1" role="button" style="border-radius: 0px;">Área de Atuação</a> <a href="categoria.php" class="btn btn-warning" role="button" style="border-radius: 0px;">Área de Atuação</a>
							</div>
						</div>
					<?php endforeach;?>
				<?php else:?>
					<div class="row mb-5">
						Você não possui nenhum projeto.
					</div>
				<?php endif;?>

				<!-- PADRAO
				<div class="row mb-5">
					<div class="col-md-4">
						<img src="<?=base_url('assets/imagens/projeto_02.jpg')?>" class="img-thumbnail" width="100%">
					</div>
					<div class="col-md-8">
						<a href="projeto.php"><h3>Nome Projeto</h3></a>
						<p><i>Breve Descrição</i></p>
						<a href="categoria.php" class="btn btn-warning mr-1" role="button" style="border-radius: 0px;">Área de Atuação</a> <a href="categoria.php" class="btn btn-warning" role="button" style="border-radius: 0px;">Área de Atuação</a>
					</div>
				</div>-->

				<?php if(isset($projetos) && !empty($projetos)):?>
					<div class="row">
						<div class="col-12">
							<nav>
							  <ul class="pagination">
							    <li class="page-item disabled">
							      <a class="page-link" href="#" tabindex="-1">Voltar</a>
							    </li>
							    <li class="page-item active"><a class="page-link" href="#">1</a></li>
							    <li class="page-item">
							      <a class="page-link" href="#">2</a>
							    </li>
							    <li class="page-item"><a class="page-link" href="#">3</a></li>
							    <li class="page-item">
							      <a class="page-link" href="#">Próximo</a>
							    </li>
							  </ul>
							</nav>
						</div>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>