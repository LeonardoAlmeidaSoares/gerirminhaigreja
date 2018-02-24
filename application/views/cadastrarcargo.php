<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cadastrar Cargo
            <small>Insira um novo Cargo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cargos</a></li>
            <li class="active">Cadastrar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

<!-- Input addon -->
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Cadastrar Cargo</h3>
	</div>
	<div class="box-body">	
		<form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/cargo/cadastrar') ?>">
			<div class="row">
				<div class="col-md-12">				
					<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
					  <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição" required="required">
					</div>
				</div>
			</div>
			<hr>
			<div class="btn-group">        
				<input type="submit" class="btn btn-default" value="Salvar" />
				<input type="button" class="btn btn-default" value="Cancelar" />        
			</div>
		</form>
	</div>
</div>
