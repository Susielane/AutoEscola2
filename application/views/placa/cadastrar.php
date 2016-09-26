      <div class="container">
  		<div class="row">
  			<div class="col md-12"><h1>Cadastrar Placa</h1></div>
          
          <?php 
          $alerta = null;
          if($alerta) {?>

          <div class="alert alert-<?php echo $alerta["class"]; ?>"> 
            <?php echo $alerta["mensagem"]; ?>
          </div>

          <?php } ?>


          <?php 
            $array = array(
                "class" => "form-horizontal"
            );
            echo form_open_multipart('placa/cadastrar', $array); 
          ?>

  					<input type="hidden" name="captcha" >

  					<div class="form-group">
  						<label for="nome_placa" class="col-sm-2 control-label">Nome da Placa</label>
  						<div class="col-sm-10">
  							<input type="text" name="nome_placa" class="form-control" id="nome_placa" value=" <?php echo  set_value('nome_placa') ? set_value('nome_placa') : ''; ?>" required>
  						</div>
  					</div>

            <div class="form-group">
              <label for="descricao_placa" class="col-sm-2 control-label">Descrição da Placa</label>
              <div class="col-sm-10">
                <input type="text" name="descricao_placa" class="form-control" id="descricao_placa" value=" <?php echo  set_value('descricao_placa') ? set_value('descricao_placa') : ''; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="nome_imagem" class="col-sm-2 control-label">Imagem da Placa</label>
              <div class="col-sm-10">
                <input type="file" name="nome_imagem" class="form-control" id="nome_imagem"  required >
              </div>
            </div>

  					

  					<div class="form-group">
  						<div class="col-sm-offset-2 col-sm-4">
  							<a href="<?php echo base_url('placa/visualizar_todos'); ?>" type="submit" class="btn btn-default" >Voltar</a>
  						</div>
  						<div class="col-sm-offset-2 col-sm-4">
  							<button type="submit" name="cadastrar" value="cadastrar" class="btn btn-success pull-right">Cadastrar</button>
  						</div>
  					</div>




  				</form>

  			</div>
  		</div>

