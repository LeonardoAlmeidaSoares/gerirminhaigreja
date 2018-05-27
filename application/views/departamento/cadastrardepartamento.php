<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cadastrar Departamento
            <small>Insira um novo Departamento</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url("index.php/departamento/listar");?>">Departamentos</a></li>
            <li class="active">Cadastrar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

<!-- Input addon -->
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Cadastrar Departamento</h3>
	</div>
	<div class="box-body">	
		
		<div class="row">
			<div class="col-md-6">			
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>
				  <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição" required="required">
				</div>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-md-6">    
				<div class="form-group">
					<label>Responsáveis pelo Departamento</label>
					<select class="form-control select2" multiple="multiple" data-placeholder="Selecione um membro" style="width: 100%;" name="txtResponsavel" id="txtResponsavel">
					  <?php
                    foreach ($membros->result() as $row) {
                        echo "<option value='$row->idMembro'>$row->nome</option>";
                    }
                    ?>
					</select>
				</div>
			</div>
		</div>
	
	<br />
			<hr>
			<div class="btn-group">        
				<input type="submit" class="btn btn-default cadastrar" value="Salvar" />
				<input type="button" class="btn btn-default cancelar" value="Cancelar" />        
			</div>
		
	</div>
</div>
<script>
$(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
		$(".cancelar").click(function(){
			//alert($("#txtResponsavel").val());
		});
		
		$(".cadastrar").click(function(){		
			
			$.ajax({				
				url: "<?php echo base_url("index.php/departamento/cadastrar");?>",
				datatype: 'json',
				data: {
					descricao: $("#descricao").val(),
					txtResponsavel: $("#txtResponsavel").val()
				},
				error: function (request, status, error) {
					alert(request.responseText);
				},
				type: "POST",
				cache: false
			}).success(function (html) { 
				alert("Cadastro efetuado com sucesso!!!");
					
			});
		});
});
</script>