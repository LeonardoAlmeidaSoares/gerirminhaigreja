<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
			Listar Slides
            <small>Lista de Slides Cadastrados</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo base_url("index.php/slides/listar");?>">Slides</a></li>
          <li class="active">Listar</li>
        </ol>
    </section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Slides Cadastrados</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						 <table id="example2" class="table table-bordered table-hover">
							<thead>
							  <tr>
								<th>#</th>
								<th>Imagem</th>							
								<th>Ações</th>
							  </tr>
							</thead>
							<tbody>
							<?php 
								foreach ($slides->result() as $row) {
							?>
							  <tr>
								<td><?php echo $row->idSlide; ?></td>
								<td> <img src="<?php echo $row->caminho; ?>" style="width:150px"> </td>
								<td>
									<!--i class="fa fa-eye" u="<?php echo $row->idSlide; ?>" title="Visualizar"></i-->
									<i class="fa fa-edit" u="<?php echo $row->idSlide; ?>" title="Editar"></i>&nbsp
									<i class="fa fa-remove" u="<?php echo $row->idSlide; ?>" title="Escluir"></i>
								</td>
							  </tr>
							<?php 
								} 
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
    $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
		
		$(".fa-remove").click(function(){
			var cod = $(this).attr("u");
			//alert($(this).children().attr("codImg"));
			var r = confirm("Deseja Excluir o registro?");
			if (r == true){		
			$.ajax({
                url: "<?php echo base_url("index.php/site/excluirSlide"); ?>",
                data: {
                    cod : cod,					
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                },
                type: "POST"
            }).success(function (html) {
				alert(html);
				location.reload();
			});

			}

		});
    });
</script>