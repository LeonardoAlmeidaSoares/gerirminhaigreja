<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

          <h1>

            Institucional

            <small>Textos Institucionais</small>

          </h1>

          <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">Institucional</a></li>

            <li class="active">Gerir</li>

          </ol>

        </section>



        <!-- Main content -->

        <section class="content">



<!-- Input addon -->

<div class="box box-info">

  <div class="box-header with-border">

    <h3 class="box-title">Institucional</h3>

  </div>

  <div class="box-body">

	<form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/site/updateInstitucional') ?>">
	
  
	<div class="row">
		<div class="col-md-12">							
			<div class="box-body pad">
				<label> Sobre a Igreja </label>
				<textarea id="editor1" name="editor1" rows="10" cols="80" >	
					<?= $info->sobre_igreja ?>
				</textarea>              
			</div>
			
		</div>					
	</div>
	
	<div class="row">
		<div class="col-md-12">							
			<div class="box-body pad">
				<label> Sobre os Pastores </label>
				<textarea id="editor2" name="editor2" rows="10" cols="80" >
					<?= $info->sobre_pastores ?>
				</textarea>              
			</div>
			
		</div>					
	</div>
	
	<div class="row">
		<div class="col-md-12">							
			<div class="box-body pad">
				<label> Versículo do dia </label>
				<textarea id="editor3" name="editor3" rows="10" cols="80" >	
					<?= $info->versiculo_dia ?>
				</textarea>              
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
		 CKEDITOR.replace('editor2');
		 CKEDITOR.replace('editor3');

		

		

	});

</script>