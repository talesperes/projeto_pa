<div class="container py-5 mt-5 mb-5">
	<div class="row justify-content-center">
		<div class="col-4 col-lg-2 text-center">
			<a href="<?=site_url('projeto/visualizar/'.$projeto['id_projeto'])?>" class="btn btn-primary btn-block" role="button"><i class="fas fa-long-arrow-alt-left"></i> Voltar</a>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-12 text-center">
			<h2 class="text-primary"><strong>Editar Projeto</strong></h2>
		</div>
	</div>
	<div class="row justify-content-center mt-3">
		<div class="col-md-8">
			<form method="post" action="<?=site_url('projeto/editar_projeto/'.$projeto['id_projeto'])?>" enctype="multipart/form-data">
			    <label>Escolha uma capa para seu Projeto:</label>
			    <input type="file" name="img_projeto" id="img_projeto" class="form-control btn btn-warning">
				<div class="form-group mt-3">
					<label>Nome do Projeto</label>
				    <input type="text" name="nome" class="form-control" required value="<?=$projeto['titulo']?>">						    
			    </div>
			    <div class="form-group">
					<label>Descrição</label>
				    <textarea name="descricao" class="form-control" rows="6" required><?=$projeto['descricao']?></textarea>						    
			    </div>
			    <div class="form-group">
					<label>Área Destinada:</label>
				    <select name="area" class="form-control" required>
				    	<option <?=($projeto['categoria'] == 'Arquitetura' ? 'selected' : '')?> value="Arquitetura">Arquitetura</option>
				    	<option <?=($projeto['categoria'] == 'Biologia' ? 'selected' : '')?> value="Biologia">Biologia</option>
				    	<option <?=($projeto['categoria'] == 'Computação' ? 'selected' : '')?> value="Computação">Computação</option>
				    	<option <?=($projeto['categoria'] == 'Engenharia' ? 'selected' : '')?> value="Engenharia">Engenharia</option>
				    	<option <?=($projeto['categoria'] == 'Psicologia' ? 'selected' : '')?> value="Psicologia">Psicologia</option>
				    </select>						    
			    </div>
			    <div class="form-group">
					<label>Quantas pessoas poderão participar do seu projeto?</label>
				    <input type="number" name="num_pessoas" class="form-control col-2" required value="<?=$projeto['num_pessoas']?>">						    
			    </div>
			    <input type="submit" name="botao" class="btn btn-primary btn-block" value="Editar">
			</form>
		</div>
	</div>
</div>