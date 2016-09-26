	
	<div class="container">
		<div class="row">
			<div class="col md-12"><h1>Editar Placa</h1></div>

			<?php 
			$alerta = null;
			if($alerta) {?>

			<div class="alert alert-<?php echo $alerta["class"]; ?>"> 
				<?php echo $alerta["mensagem"]; ?>
			</div>

			<?php } ?> 

			

			<?php if($placa){ ?>
                <form class="form-horizontal" action="<?php echo base_url("placa/editar/".$placa["codigo_placa"]); ?>" method="post">
                <input type="hidden" name="captcha" >
                <input type="hidden" name="codigo_placa" value="<?php echo $placa["codigo_placa"]; ?>" >
				
			    <div class="form-group">
  						<label for="nome_placa" class="col-sm-2 control-label">Nome da Placa</label>
  						<div class="col-sm-10">
  							<input type="text" name="nome_placa" class="form-control" id="nome_placa" value=" <?php echo  set_value('nome_placa') ? set_value('nome_placa') : $placa["nome_placa"]; ?>" required>
  						</div>
  					</div>

	            <div class="form-group">
	              <label for="descricao_placa" class="col-sm-2 control-label">Descrição da Placa</label>
	              <div class="col-sm-10">
	                <input type="text" name="descricao_placa" class="form-control" id="descricao_placa" value=" <?php echo  set_value('descricao_placa') ? set_value('descricao_placa') : $placa["descricao_placa"]; ?>" required>
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="nome_imagem" class="col-sm-2 control-label">Imagem da Placa</label>
	              <div class="col-sm-10">
	                <input type="file" name="nome_imagem" class="form-control" id="nome_imagem" value=" <?php echo  set_value('nome_imagem') ? set_value('nome_imagem') : '' ; ?>"  required >
	              </div>
	            </div>

			 
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-4">
			      <a href="<?php echo base_url('placa/visualizar_todos'); ?>" type="submit" class="btn btn-default" >Voltar</a>
			    </div>
                <div class="col-sm-offset-2 col-sm-4">
                  <button type="submit" name="editar" value="editar" class="btn btn-success pull-right">Finalizar Edição</button>
                </div>
			  </div>
			</form>
			<?php } ?>
		</div>
	</div>
    
