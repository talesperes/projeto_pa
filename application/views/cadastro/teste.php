<div class="form-card dados-escolaridade">
 <h2 class="fs-title text-primary">Escolaridade</h2>
 <div class="form-group">
		<label>Nível de Escolaridade</label>
		<select name="nivel_escolaridade" class="nivel_escolaridade form-control">
	    	<option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
	    	<option value="Ensino Médio Completo">Ensino Médio Completo</option>
	    	<option value="Superior Incompleto">Superior Incompleto</option>
	    	<option value="Superior Completo">Superior Completo</option>
	    	<option value="Cursando Técnico">Cursando Técnico</option>
	    </select>
    </div>
   <div class="form-group">
		<label>Instituição</label>
	   <input type="text" name="instituicao" class="instituicao form-control nivel_escolaridade">				    
   </div>
		<div class="form-group">
    <label>Curso</label>
			<input type="text" name="curso" class="curso form-control nivel_escolaridade">
	</div>
	<div class="form-group">
		<div class="form-row">
     	<div class="col-md-6 mb-2">
          <label>Ano de Início</label>
				<select name="ano_inicio" class="form-control ano_inicio nivel_escolaridade">
		   		<option>Selecionar</option>
	      	</select>
       </div>
       <div class="col-md-6">
          <label>Ano de Conclusão</label>
				<select name="ano_conclusao" class="form-control ano_conclusao nivel_escolaridade">
	    			<option>Selecionar</option>
     			</select>
       </div>
  	</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-right">
			<div class="remove_escolaridade btn btn-danger" style="border-radius: 30px;">-</div>
			<div class="add_escolaridade btn btn-primary" style="border-radius: 30px;">+</div>
		</div>
	</div>
</div>
<div class="form-card dados-escolaridade">
 <h2 class="fs-title text-primary">Escolaridade</h2>
 <div class="form-group">
		<label>Nível de Escolaridade</label>
		<select name="nivel_escolaridade" class="nivel_escolaridade form-control">
	    	<option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
	    	<option value="Ensino Médio Completo">Ensino Médio Completo</option>
	    	<option value="Superior Incompleto">Superior Incompleto</option>
	    	<option value="Superior Completo">Superior Completo</option>
	    	<option value="Cursando Técnico">Cursando Técnico</option>
	    </select>
    </div>
   <div class="form-group">
		<label>Instituição</label>
	   <input type="text" name="instituicao" class="instituicao form-control nivel_escolaridade">				    
   </div>
		<div class="form-group">
    <label>Curso</label>
			<input type="text" name="" class="curso form-control nivel_escolaridade">
	</div>
	<div class="form-group">
		<div class="form-row">
     	<div class="col-md-6 mb-2">
          <label>Ano de Início</label>
				<select name="ano_inicio" class="ano_inicio form-control nivel_escolaridade">
		   		<option>Selecionar</option>
	      	</select>
       </div>
       <div class="col-md-6">
          <label>Ano de Conclusão</label>
				<select name="ano_conclusao" class="ano_conclusao form-control nivel_escolaridade">
	    			<option>Selecionar</option>
     			</select>
       </div>
  	</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-right">
			<div class="remove_escolaridade btn btn-danger" style="border-radius: 30px;">-</div>
			<div class="add_escolaridade btn btn-primary" style="border-radius: 30px;">+</div>
		</div>
	</div>
</div>

<button class="btn btn-primary enviar">Enviar</button>

<script type="text/javascript">
	$(".enviar").click(function() {

		var dados = [];
		var aux = [];

		$(".dados-escolaridade").each(function() {
			aux = [];
			$(this).find('.nivel_escolaridade').each(function() {
				aux.push($(this).val());
			});
			dados.push(aux);
		});

		console.log(dados);

	});
</script>