<div class="container py-5 mt-5 mb-5">
	<div class="row">
		<div class="col-12 text-center">
			<h2 class="text-primary"><strong>Criar Projeto</strong></h2>
		</div>
	</div>
	<div class="row justify-content-center mt-3">
		<div class="col-md-8">
			<form method="post" action="<?=site_url('projeto/criar_projeto')?>" enctype="multipart/form-data">
			    <label>Escolha uma capa para seu Projeto:</label>
			    <input type="file" name="img_projeto" id="img_projeto" class="form-control btn btn-warning">
				<div class="form-group mt-3">
					<label>Nome do Projeto</label>
				    <input type="text" name="nome" class="form-control" required>						    
			    </div>
			    <div class="form-group">
					<label>Descrição</label>
				    <textarea name="descricao" class="form-control" rows="6" required></textarea>						    
			    </div>
			    <div class="form-group">
					<label>Área Destinada:</label>
				    <select name="area" class="form-control" required>
				    	<option value="Arquitetura">Arquitetura</option>
				    	<option value="Biologia">Biologia</option>
				    	<option value="Computação">Computação</option>
				    	<option value="Engenharia">Engenharia</option>
				    	<option value="Psicologia">Psicologia</option>
				    </select>						    
			    </div>
			    <div class="form-group">
					<label>Quantas pessoas poderão participar do seu projeto?</label>
				    <input type="number" name="num_pessoas" class="form-control col-2" required>						    
			    </div>
			    <input type="submit" name="botao" class="btn btn-primary btn-block" value="Criar">
			</form>
		</div>
	</div>
</div>