<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cadastrar Congregado
            <small>Insira um novo Congregaçã</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Congregação</a></li>
            <li class="active">Cadastrar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

<!-- Input addon -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastrar Congregação</h3>
  </div>
  <div class="box-body">
	<form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/congregacao/cadastrar') ?>">
	<div class="row">
		<div class="col-md-12">	
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
				  <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Nome/Descrição" required="required">
				</div>		
			</div>
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
				  <input type="text" name="email" id="email" class="form-control" placeholder="E-mail">
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
				  <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Logradouro">
				</div>
			</div>
			<div class="col-md-6">    
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>
				  <input type="text" name="numero" id="numero" class="form-control" placeholder="Número">
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
				  <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro">
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>
				  <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento">
				</div>
			</div>
		</div>
	</div>
    <br />
	<div class="row">		
		<div class="col-md-12">
			<h5>Cidade (selecione o estado primeiro) </h5>
			<div class="col-md-6">
				<div class="form-group">
				  <select class="form-control" id="txtEstado" name="estado">      
					<option value="0">Estado</option>
                    <?php
                    foreach ($estados->result() as $row) {
                        echo "<option value='$row->codEstado'>$row->descricao</option>";
                    }
                    ?>
				  </select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				  <select class="form-control" id="txtCidade" name="cidade">      
					<option>Cidade, Selecione o Estado...</option>
					
				  </select>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>
				  <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP" data-inputmask='"mask": "99999-999"' data-mask>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span></span>
				  <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" data-inputmask='"mask": "(99) 9999-9999"' data-mask>
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
		$("#txtEstado").change(function () {
            if ($("#txtEstado :selected").val() !== "") {

                $('#txtCidade').empty();
                $('#txtCidade').html('Carregando....');
                var idestado = $("#txtEstado :selected").val();

                $.ajax({
                    url: "<?php echo base_url("index.php/cidade/getCidades"); ?>",
                    data: {
                        idEstado: idestado
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                    },
                    type: "POST",
                    cache: false
                }).success(function (html) {
                    html = "<option selected>Selecione a Cidade</option>" + html;
                    $("#txtCidade").append(html);
                    $("#txtEstado").val(idestado);
					/*<?php if (isset($_SESSION["idestado"])) { ?>
                        if ($("#txtEstado :selected").val() === "<?php echo $_SESSION["codEstado"]; ?>") {
                        }
					<?php } ?>*/
                });
            }
        });
		
		$("[data-mask]").inputmask();
		
		
	});
</script>