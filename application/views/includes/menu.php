	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Ok Design</a>
	    </div>

		<?php if(@!$hidemenu){ ?>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Placas <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo base_url('placa/visualizar_todos'); ?>">Visualizar</a></li>
	            <li><a href="<?php echo base_url('placa/cadastrar'); ?>">Cadastrar</a></li>
	            
	          </ul>
	        </li>
	        
	      </ul>
	      
	      
	    </div><!-- /.navbar-collapse -->
	    <?php } ?>

	  </div><!-- /.container-fluid -->
	</nav>