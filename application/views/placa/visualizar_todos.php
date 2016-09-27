	<div class="container">
		<div class="row">
			<div class="col md-12">
				<h1>Visualização de Placas</h1>
			</div>
			<div class="table-responsive">
			  <table class="table">
			    <thead>
			    	<tr>
			    		<th>PLACA</th>
			    		<th>NOME</th>
			    		<th>DESCRIÇÃO</th>
			    		<th>AÇÕES</th>
			    	</tr>
			    </thead>
			    <tbody>
			    	<?php
			    		if($placas){
			    			foreach ($placas as $placa) {
			    	?>

						<tr>
							<td> <img class="placa" src="<?php echo base_url("assets/uploads/placas/".$placa["nome_imagem"] ); ?>" alt="" class="img-responsive"> </td>
							<td> <?php echo $placa["nome_placa"]; ?> </td>
							<td> <?php echo $placa["descricao_placa"]; ?> </td>
							<td><a class="btn btn-default" href=" <?php echo base_url('placa/editar/'.$placa["codigo_placa"]); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
								<a class="btn btn-danger" href="<?php echo base_url('placa/deletar/'. $placa["codigo_placa"]); ?>" onclick="return confirm('Deseja deletar este placa?'); "><i class="glyphicon glyphicon-trash"></i></a></td>

						</tr>

			    	<?php
			    		  } //end foreach
			    		} else {
			    	 ?>

			    	 <tr>
			    	 	<td colspan="3" class="text-center">Não há placas cadastradas.</td>
			    	 </tr>

			    	 <?php
			    	 	} //end if
			    	 ?>
			    </tbody>
			  </table>
			</div>
		</div>
	</div>
