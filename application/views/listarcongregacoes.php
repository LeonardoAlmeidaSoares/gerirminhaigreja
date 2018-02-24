<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
			Listar Congregações
            <small>Lista de Congregações Cadastradas</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo base_url("index.php/congragacao/listar");?>">Congregações</a></li>
          <li class="active">Listar</li>
        </ol>
    </section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Congregações Cadastradas</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						 <table id="example2" class="table table-bordered table-hover">
							<thead>
							  <tr>
								<th>Descrição</th>
								<th>Telefone</th>
								<th>Email</th>
								<th>Ações</th>
							  </tr>
							</thead>
							<tbody>
							<?php 
								foreach ($congregacoes->result() as $row) {
							?>
							  <tr>
								<td><?php echo $row->descricao; ?></td>
								<td><?php echo $row->telefone; ?></td>
								<td><?php echo $row->email; ?></td>
								<td>
									<i class="fa fa-eye" u="<?php echo $row->idCongregacao; ?>" title="Visualizar"></i>&nbsp
									<i class="fa fa-edit" u="<?php echo $row->idCongregacao; ?>" title="Editar"></i>&nbsp
									<i class="fa fa-remove" u="<?php echo $row->idCongregacao; ?>" title="Inativar"></i>
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
    });
</script>