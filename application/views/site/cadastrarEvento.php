<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cadastrar Evento<small>Insira um novo Evento</small></h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Evento</a></li>
          <li class="active">Cadastrar</li>
        </ol>
    </section>

	<!-- Main content -->
    <section class="content">
		<!-- Input addon -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Cadastrar Evento</h3>
			</div>
			<div class="box-body">
				<form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/site/cadastroEvento') ?>">
					<div class="row">
						<div class="col-md-12">	
							<div class="col-md-12">
								<div class="input-group">
								  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
								  <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Evento" required="required">
								</div>
							</div>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-md-12">	
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span></span>
									<input type="text" name="data" id="data" class="form-control" placeholder="Data do Evento" data-inputmask='"mask": "99/99/9999"' data-mask />
								</div>
							</div>	
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></span>
									<input type="text" name="hora" id="hora" class="form-control" placeholder="Hora do Evento" data-inputmask='"mask": "99:99"' data-mask>
								</div>
							</div>	
						</div>					
					</div>					
					<br />	
					<div class="row">
						<div class="col-md-12">	
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>
									<input type="text" name="local" id="local" class="form-control" placeholder="Local do Evento" />
								</div>
							</div>	
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></span>
									<input type="text" name="valor" id="valor" class="form-control" placeholder="Valor" />
								</div>
							</div>	
						</div>					
					</div>					
					<br />
					<div class="row">
						<div class="col-md-12">	
							<div class="col-md-12">
								<div class="input-group">
								  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
								  <input type="text" name="obs" id="obs" class="form-control" placeholder="Observação" required="required">
								</div>
							</div>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-md-12">							
							<div class="box-body pad">
								<label> Descrição do Evento </label>
								<textarea id="editor1" name="editor1" rows="10" cols="80" >										
								</textarea>              
							</div>
							
						</div>					
					</div>
					<div class="row">
						<div class="col-md-12">	
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputFile">Imagem</label>
									<input type="file" id="userfile" name="userfile">
									<p class="help-block">Selecione uma Imagem</p>
								</div>
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
	</section>
</div>

<script language="javascript">

    $(function () {
		$("[data-mask]").inputmask();	
		 
		 CKEDITOR.replace('editor1');	

	});

</script>
