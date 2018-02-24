<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

          <h1>

            Cadastrar Notícia

            <small>Insira uma Nova Notícia</small>

          </h1>

          <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">Notícias</a></li>

            <li class="active">Cadastrar</li>

          </ol>

        </section>



        <!-- Main content -->

        <section class="content">



<!-- Input addon -->

<div class="box box-info">

  <div class="box-header with-border">

    <h3 class="box-title">Cadastrar Notícia</h3>

  </div>

  <div class="box-body">

	<form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/site/cadastroNoticia') ?>">

	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
				  <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título" required="required">
				</div>
			</div>
		</div>
	</div>	
  
	<div class="row">
		<div class="col-md-12">				
			 <div class="box-body pad">			  
                    <textarea id="editor1" name="editor1" rows="10" cols="80" >
						
                    </textarea>              
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputFile">Imagem Destacada</label>
					<input type="file" id="userfile" name="userfile">
					<p class="help-block">Selecione uma Imagem</p>
				</div>
			</div>
		</div>
	</div>
	<br />
    
	<hr>

	<div class="btn-group">        

		<input type="submit" class="btn btn-default" value="Salvar" />

		<input type="button" class="btn btn-default" value="Cancelar" />        

    </div>
   </form>

  </div><!-- /.box-body -->

</div><!-- /.box -->

</section>

</div>

<script language="javascript">

    $(function () {

		 CKEDITOR.replace('editor1');

		

		

	});

</script>