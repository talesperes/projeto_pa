<form class="mt-4" action="<?=site_url('perfil/salvar_escolaridade/'.$escolaridade['id_escolaridade'])?>" method="post">
  <div class="form-group">
    <label for="nivel-escolaridade">Nível de Escolaridade</label>
    <select name="nivel-escolaridade" class="form-control" required="required">
      <option <?=($escolaridade['tipo'] == 'Ensino Médio Incompleto' ? 'selected' : '')?> value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
      <option <?=($escolaridade['tipo'] == 'Ensino Médio Completo' ? 'selected' : '')?> value="Ensino Médio Completo">Ensino Médio Completo</option>
      <option <?=($escolaridade['tipo'] == 'Superior Incompleto' ? 'selected' : '')?> value="Superior Incompleto">Superior Incompleto</option>
      <option <?=($escolaridade['tipo'] == 'Superior Completo' ? 'selected' : '')?> value="Superior Completo">Superior Completo</option>
      <option <?=($escolaridade['tipo'] == 'Cursando Técnico' ? 'selected' : '')?> value="Cursando Técnico">Cursando Técnico</option>
    </select>
  </div>
  <div class="form-group">
    <label for="curso">Curso</label>
    <input type="text" class="form-control" id="curso" name="curso" value="<?=$escolaridade['curso']?>" required="required">
  </div>
  <div class="form-group">
    <label for="instituicao">Instituição</label>
    <input type="text" class="form-control" id="instituicao" name="instituicao" value="<?=$escolaridade['instituicao']?>" required="required">
  </div>
  <div class="form-group">
  	<div class="form-row">
  		<div class="col-6">
    		<label for="ano_inicio">Ano de Início</label>
    		<select name="ano_inicio" class="form-control" required="required">
    			<option value="">Selecionar</option>
	   			<option <?=($escolaridade['ano_inicio'] == '2015' ? 'selected' : '')?> value="2015">2015</option>
	   			<option <?=($escolaridade['ano_inicio'] == '2016' ? 'selected' : '')?> value="2016">2016</option>
	   			<option <?=($escolaridade['ano_inicio'] == '2017' ? 'selected' : '')?> value="2017">2017</option>
	   			<option <?=($escolaridade['ano_inicio'] == '2018' ? 'selected' : '')?> value="2018">2018</option>
	   			<option <?=($escolaridade['ano_inicio'] == '2019' ? 'selected' : '')?> value="2019">2019</option>
	   			<option <?=($escolaridade['ano_inicio'] == '2020' ? 'selected' : '')?> value="2020">2020</option>
    		</select>
    	</div>
    	<div class="col-6">
    		<label for="ano_fim">Ano de Conclusão</label>
    		<select name="ano_fim" class="form-control" required="required">
    			<option value="">Selecionar</option>
	   			<option <?=($escolaridade['ano_fim'] == '2015' ? 'selected' : '')?> value="2015">2015</option>
	   			<option <?=($escolaridade['ano_fim'] == '2016' ? 'selected' : '')?> value="2016">2016</option>
	   			<option <?=($escolaridade['ano_fim'] == '2017' ? 'selected' : '')?> value="2017">2017</option>
	   			<option <?=($escolaridade['ano_fim'] == '2018' ? 'selected' : '')?> value="2018">2018</option>
	   			<option <?=($escolaridade['ano_fim'] == '2019' ? 'selected' : '')?> value="2019">2019</option>
	   			<option <?=($escolaridade['ano_fim'] == '2020' ? 'selected' : '')?> value="2020">2020</option>
    		</select>
    	</div>
    </div>
  </div>
  <center><input type="submit" name="botao_alterar" class="btn btn-primary btn-block btn-lg" value="Alterar" style="font-size: 16px;"></center>
</form>