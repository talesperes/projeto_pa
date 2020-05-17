<section class="py-5">
	<div class="container-fluid px-5">
		<div class="row pt-3">
			<div class="col-md-9">
				<div class="row mb-5">
					<div class="col-md-3">
						<a href="<?=site_url('projeto/criar_projeto')?>" class="btn btn-success btn-block" role="button">Criar Projeto +</a>
					</div>
					<div class="col-md-9">
						<form class="form-inline" method="post" action="">
						  <input class="form-control mr-3 w-75" type="text" placeholder="Pesquise por título, instituição ou área de conhecimento" aria-label="Procurar">
						   <button class="btn btn-primary no-hover" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-4">
						<img src="<?=base_url('assets/imagens/projeto_01.jpg')?>" class="img-thumbnail" width="100%">
					</div>
					<div class="col-md-8">
						<a href="projeto.php"><h3>Nome Projeto</h3></a>
						<p><i>Breve Descrição</i></p>
						<p>Criado por <a href="">Nome</a></p>
						<a href="categoria.php" class="btn btn-warning mr-1" role="button" style="border-radius: 0px;">Área de Atuação</a> <a href="categoria.php" class="btn btn-warning" role="button" style="border-radius: 0px;">Área de Atuação</a>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-4">
						<img src="<?=base_url('assets/imagens/projeto_02.jpg')?>" class="img-thumbnail" width="100%">
					</div>
					<div class="col-md-8">
						<a href="projeto.php"><h3>Nome Projeto</h3></a>
						<p><i>Breve Descrição</i></p>
						<p>Criado por <a href="">Nome</a></p>
						<a href="categoria.php" class="btn btn-warning mr-1" role="button" style="border-radius: 0px;">Área de Atuação</a> <a href="categoria.php" class="btn btn-warning" role="button" style="border-radius: 0px;">Área de Atuação</a>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-4">
						<img src="<?=base_url('assets/imagens/projeto_03.jpg')?>" class="img-thumbnail" width="100%">
					</div>
					<div class="col-md-8">
						<a href="projeto.php"><h3>Nome Projeto</h3></a>
						<p><i>Breve Descrição</i></p>
						<p>Criado por <a href="">Nome</a></p>
						<a href="categoria.php" class="btn btn-warning mr-1" role="button" style="border-radius: 0px;">Área de Atuação</a> <a href="categoria.php" class="btn btn-warning" role="button" style="border-radius: 0px;">Área de Atuação</a>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-4">
						<img src="<?=base_url('assets/imagens/projeto_04.jpg')?>" class="img-thumbnail" width="100%">
					</div>
					<div class="col-md-8">
						<a href="projeto.php"><h3>Nome Projeto</h3></a>
						<p><i>Breve Descrição</i></p>
						<p>Criado por <a href="">Nome</a></p>
						<a href="categoria.php" class="btn btn-warning mr-1" role="button" style="border-radius: 0px;">Área de Atuação</a> <a href="categoria.php" class="btn btn-warning" role="button" style="border-radius: 0px;">Área de Atuação</a>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<nav>
						  <ul class="pagination">
						    <li class="page-item disabled">
						      <a class="page-link" href="#" tabindex="-1">Voltar</a>
						    </li>
						    <li class="page-item"><a class="page-link" href="#">1</a></li>
						    <li class="page-item active">
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
			</div>
			<div class="col-md-3">
				<div class="row">
					<div class="col-12 text-right">
						<h5 class="mb-4">Filtrar por:</h5>
						<form class="form-inline justify-content-end" method="post" action="projetos.php">
						   <select class="form-control mr-3" name="filtro">
						   		<option value="mais-visitados">Mais Visitados</option>
						   		<option value="ordem-alfabetica">Ordem Alfabética</option>
						   </select>
						   <button class="btn btn-primary no-hover" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
						</form>
						<h5 class="font-weight-bold text-primary mt-4">Área</h5>
						<ul class="list-group list-group-flush">
						  <li class="list-group-item"><span class="badge badge-primary mr-3">14</span><a href="">Cras justo odio</a></li>
						  <li class="list-group-item"><span class="badge badge-primary mr-3">14</span><a href="">Dapibus ac facilisis in</a></li>
						  <li class="list-group-item"><span class="badge badge-primary mr-3">14</span><a href="">Morbi leo risus</a></li>
						  <li class="list-group-item"><span class="badge badge-primary mr-3">14</span><a href="">Porta ac consectetur ac</a></li>
						  <li class="list-group-item"><span class="badge badge-primary mr-3">14</span><a href="">Vestibulum at eros</a></li>
						  <li class="list-group-item active"><a href="" class="text-white">Ver todas</a></li>
						</ul>
						<h5 class="font-weight-bold text-primary mt-4">Instituição de Ensino</h5>
						<ul class="list-group list-group-flush">
						  <li class="list-group-item"><span class="badge badge-primary mr-3">14</span><a href="">Cras justo odio</a></li>
						  <li class="list-group-item"><span class="badge badge-primary mr-3">14</span><a href="">Dapibus ac facilisis in</a></li>
						  <li class="list-group-item"><span class="badge badge-primary mr-3">14</span><a href="">Morbi leo risus</a></li>
						  <li class="list-group-item"><span class="badge badge-primary mr-3">14</span><a href="">Porta ac consectetur ac</a></li>
						  <li class="list-group-item"><span class="badge badge-primary mr-3">14</span><a href="">Vestibulum at eros</a></li>
						  <li class="list-group-item active"><a href="" class="text-white">Ver todas</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>