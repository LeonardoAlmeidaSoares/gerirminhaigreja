<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cadastrar Slide<small>Insira um novo Slide</small></h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Slides</a></li>
          <li class="active">Cadastrar</li>
        </ol>
    </section>

	<!-- Main content -->
    <section class="content">
		<!-- Input addon -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Cadastrar Slide</h3>
			</div>
			<div class="box-body">
				<form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/site/cadastroSlide') ?>">
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