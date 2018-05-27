	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
			Listar Cargos
            <small>Lista de Cargos Cadastrados</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo base_url("index.php/cargos/listar");?>">Cargos</a></li>
          <li class="active">Listar</li>
        </ol>
    </section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Cargos Cadastrados</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						 <table id="example2" class="table table-bordered table-hover">
							<thead>
							  <tr>
								<th>Descrição</th>								
								<th>Ações</th>
							  </tr>
							</thead>
							<tbody>
							<?php 
								foreach ($cargos->result() as $row) {
									if ($row->status==0){
										$style="color:#ccc;";
									}else{
										$style="";
									}
							?>
							  <tr style="<?php echo $style;?>">
								<td><?php echo $row->descricao; ?></td>
								<td>
									<i class="fa fa-eye" u="<?php echo $row->idCargo; ?>" title="Visualizar" data-toggle="modal" data-target="#myModal"></i>&nbsp
									<i class="fa fa-edit edit" u="<?php echo $row->idCargo; ?>" title="Editar" data-toggle="modal" data-target="#myModal"></i>&nbsp
									<?php if ($row->status==0){ ?>
										<i class="fa fa-check btnAtivar" u="<?php echo $row->idCargo; ?>" title="Ativar"></i>	
									<?php } else { ?>
										<i class="fa fa-remove btnRemove" u="<?php echo $row->idCargo; ?>" title="Inativar"></i>									
									<?php }	?>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalhes</h4>
      </div>
      <div class="modal-body">
	
    <div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<button class="btn btn-default editar hidden-print"><i class="fa fa-edit" title="Editar"></i></button>&nbsp
				<button class="btn btn-default imprimir hidden-print" onclick="window.print();"><i class="fa fa-print" title="Imprimir"></i></button>
			</div>
			<div class="col-md-4" style="text-align:center;">
			<img src="" name="img_membro" id="img_membro" class="img_membro" style="width:70%;">
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
	<br />
	<br />
	<form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/cargo/alterar') ?>">
    <div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
				  <input type="text" name="descricao" id="descricao" class="form-control" required="required">
				</div>
				
			</div>
		</div>
	</div>
	<input type="hidden" name="txtCod" id="txtCod">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
    </div>
	</form>
 </div>
</div>
	

<script>
	function getData(cod){
		$.ajax({				
				url: "<?php echo base_url("index.php/cargo/getCargo");?>",
				datatype: 'json',
				data: {
					cod: cod
				},
				error: function (request, status, error) {
					alert(request.responseText);
				},
				type: "POST",
				cache: false
			}).success(function (html) { 			
				$("#descricao").val(html);				
				$("#txtCod").val(cod);				
			});
	}
    $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
		
		$(".edit").click(function(){
			var cod = $(this).attr("u");
			$('.form-control').attr("disabled", false);
			$('.editar').attr("disabled", true);
			getData(cod);
		});
		
		$(".fa-eye").click(function(){
			var cod = $(this).attr("u");
			$('.form-control').attr("disabled", true);
			$('.editar').attr("disabled", false);
			getData(cod);
		});
		
		$(".editar").click(function(){
			$('.form-control').attr("disabled", false);
		});
		
		$(".btnRemove").click(function(){
			var cod = $(this).attr("u");
			//alert($(this).children().attr("codImg"));
			var r = confirm("Deseja INATIVAR o registro?");
			if (r == true){			
			$.ajax({
                url: "<?php echo base_url("index.php/cargo/inativar"); ?>",
                data: {
                    cod : cod,
					status: 0
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
		
		$(".btnAtivar").click(function(){
			var cod = $(this).attr("u");
			//alert($(this).children().attr("codImg"));
			var r = confirm("Deseja ATIVAR o registro?");
			if (r == true){			
			$.ajax({
                url: "<?php echo base_url("index.php/cargo/inativar"); ?>",
                data: {
                    cod : cod,
					status: 1
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                },
                type: "POST"
            }).success(function (html) {
				alert("Registro ativado com sucesso");
				location.reload();
			});
			}
		});
    });
</script>