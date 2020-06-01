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
          <option <?=($escolaridade['ano_inicio'] == '2000' ? 'selected' : '')?> value="2000">2000</option>
          <option <?=($escolaridade['ano_inicio'] == '2001' ? 'selected' : '')?> value="2001">2001</option>
          <option <?=($escolaridade['ano_inicio'] == '2002' ? 'selected' : '')?> value="2002">2002</option>
          <option <?=($escolaridade['ano_inicio'] == '2003' ? 'selected' : '')?> value="2003">2003</option>
          <option <?=($escolaridade['ano_inicio'] == '2004' ? 'selected' : '')?> value="2004">2004</option>
          <option <?=($escolaridade['ano_inicio'] == '2005' ? 'selected' : '')?> value="2005">2005</option>
          <option <?=($escolaridade['ano_inicio'] == '2006' ? 'selected' : '')?> value="2006">2006</option>
          <option <?=($escolaridade['ano_inicio'] == '2007' ? 'selected' : '')?> value="2007">2007</option>
          <option <?=($escolaridade['ano_inicio'] == '2008' ? 'selected' : '')?> value="2008">2008</option>
          <option <?=($escolaridade['ano_inicio'] == '2009' ? 'selected' : '')?> value="2009">2009</option>
          <option <?=($escolaridade['ano_inicio'] == '2010' ? 'selected' : '')?> value="2010">2010</option>
          <option <?=($escolaridade['ano_inicio'] == '2011' ? 'selected' : '')?> value="2011">2011</option>
          <option <?=($escolaridade['ano_inicio'] == '2012' ? 'selected' : '')?> value="2012">2012</option>
          <option <?=($escolaridade['ano_inicio'] == '2013' ? 'selected' : '')?> value="2013">2013</option>
          <option <?=($escolaridade['ano_inicio'] == '2014' ? 'selected' : '')?> value="2014">2014</option>
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
          <option <?=($escolaridade['ano_fim'] == '2000' ? 'selected' : '')?> value="2000">2000</option>
          <option <?=($escolaridade['ano_fim'] == '2001' ? 'selected' : '')?> value="2001">2001</option>
          <option <?=($escolaridade['ano_fim'] == '2002' ? 'selected' : '')?> value="2002">2002</option>
          <option <?=($escolaridade['ano_fim'] == '2003' ? 'selected' : '')?> value="2003">2003</option>
          <option <?=($escolaridade['ano_fim'] == '2004' ? 'selected' : '')?> value="2004">2004</option>
          <option <?=($escolaridade['ano_fim'] == '2005' ? 'selected' : '')?> value="2005">2005</option>
          <option <?=($escolaridade['ano_fim'] == '2006' ? 'selected' : '')?> value="2006">2006</option>
          <option <?=($escolaridade['ano_fim'] == '2007' ? 'selected' : '')?> value="2007">2007</option>
          <option <?=($escolaridade['ano_fim'] == '2008' ? 'selected' : '')?> value="2008">2008</option>
          <option <?=($escolaridade['ano_fim'] == '2009' ? 'selected' : '')?> value="2009">2009</option>
          <option <?=($escolaridade['ano_fim'] == '2010' ? 'selected' : '')?> value="2010">2010</option>
          <option <?=($escolaridade['ano_fim'] == '2011' ? 'selected' : '')?> value="2011">2011</option>
          <option <?=($escolaridade['ano_fim'] == '2012' ? 'selected' : '')?> value="2012">2012</option>
          <option <?=($escolaridade['ano_fim'] == '2013' ? 'selected' : '')?> value="2013">2013</option>
          <option <?=($escolaridade['ano_fim'] == '2014' ? 'selected' : '')?> value="2014">2014</option>
          <option <?=($escolaridade['ano_fim'] == '2015' ? 'selected' : '')?> value="2015">2015</option>
          <option <?=($escolaridade['ano_fim'] == '2016' ? 'selected' : '')?> value="2016">2016</option>
          <option <?=($escolaridade['ano_fim'] == '2017' ? 'selected' : '')?> value="2017">2017</option>
          <option <?=($escolaridade['ano_fim'] == '2018' ? 'selected' : '')?> value="2018">2018</option>
          <option <?=($escolaridade['ano_fim'] == '2019' ? 'selected' : '')?> value="2019">2019</option>
          <option <?=($escolaridade['ano_fim'] == '2020' ? 'selected' : '')?> value="2020">2020</option>
          <option <?=($escolaridade['ano_fim'] == '2021' ? 'selected' : '')?> value="2021">2021</option>
          <option <?=($escolaridade['ano_fim'] == '2022' ? 'selected' : '')?> value="2022">2022</option>
          <option <?=($escolaridade['ano_fim'] == '2023' ? 'selected' : '')?> value="2023">2023</option>
          <option <?=($escolaridade['ano_fim'] == '2024' ? 'selected' : '')?> value="2024">2024</option>
          <option <?=($escolaridade['ano_fim'] == '2025' ? 'selected' : '')?> value="2025">2025</option>
          <option <?=($escolaridade['ano_fim'] == '2026' ? 'selected' : '')?> value="2026">2026</option>
          <option <?=($escolaridade['ano_fim'] == '2027' ? 'selected' : '')?> value="2027">2027</option>
          <option <?=($escolaridade['ano_fim'] == '2028' ? 'selected' : '')?> value="2028">2028</option>
          <option <?=($escolaridade['ano_fim'] == '2029' ? 'selected' : '')?> value="2029">2029</option>
          <option <?=($escolaridade['ano_fim'] == '2030' ? 'selected' : '')?> value="2030">2030</option>
    		</select>
    	</div>
    </div>
  </div>
  <center><input type="submit" name="botao_alterar" class="btn btn-primary btn-block btn-lg" value="Alterar" style="font-size: 16px;"></center>
</form>