<div class="container py-5 mt-5 mb-5">
	<div class="row">
		<div class="col-12 text-center">
			<h2 class="text-primary"><strong>Criar Projeto</strong></h2>
		</div>
	</div>
	<div class="row justify-content-center mt-3">
		<div class="col-md-8">
			<form method="post" action="">
				<form action="upload.php" method="post" enctype="multipart/form-data">
				    <label>Escolha uma capa para seu Projeto:</label>
				    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control btn btn-warning">
				    <input type="submit" value="Enviar" name="submit" class="btn btn-primary mt-2">
				</form>
				<div class="form-group mt-3">
					<label>Nome do Projeto</label>
				    <input type="text" name="nome" class="form-control">						    
			    </div>
			    <div class="form-group">
					<label>Descrição</label>
				    <textarea name="descricao" class="form-control" rows="6"></textarea>						    
			    </div>
			    <div class="form-group">
					<label>Área Destinada:</label>
				    <select name="area" class="form-control">
				    	<option value="Arquitetura">Arquitetura</option>
				    	<option value="Biologia">Biologia</option>
				    	<option value="Computação">Computação</option>
				    	<option value="Engenharia">Engenharia</option>
				    	<option value="Psicologia">Psicologia</option>
				    </select>						    
			    </div>
			    <input type="submit" name="botao" class="btn btn-primary btn-block" value="Criar">
			</form>
		</div>
	</div>
</div>