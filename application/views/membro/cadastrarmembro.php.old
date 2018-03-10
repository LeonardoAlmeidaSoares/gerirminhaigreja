<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cadastrar Membro
            <small>Insira um novo membro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Membros</a></li>
            <li class="active">Cadastrar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

<!-- Input addon -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastrar Membros</h3>
  </div>
  <?php if(isset($_SESSION["mensagem"])){
	if ($_SESSION["tipoMensagem"] == 'success'){ ?>
		<div class="alert alert-success" role="alert">
			<strong>Tudo certo!</strong> <?= $_SESSION["mensagem"];?>
		</div>
	<?php }
		else{ ?>
		<div class="alert alert-danger" role="alert">
			<strong>Algo deu errado!</strong> <?= $_SESSION["mensagem"];?>
		</div>
	<?php}
  }?>
 
  <div class="box-body">
	<form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/membro/cadastrar') ?>">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
				  <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome Completo" required="required">
				</div>
				
			</div>
			 
			<div class="col-md-6">				
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
				  <input type="text" name="nascimento" id="nascimento" class="form-control" placeholder="Data de Nascimento" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
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
    <br />	<div class="row">		<div class="col-md-12">			<div class="col-md-6">				<div class="input-group">				  <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>				  <input type="text" name="pai" id="pai" class="form-control" placeholder="Nome do Pai">				</div>			</div>			<div class="col-md-6">				<div class="input-group">				  <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>				  <input type="text" name="mae" id="mae" class="form-control" placeholder="Nome da Mãe">				</div>			</div>		</div>	</div>	    <br />		<div class="row">		<div class="col-md-12">			<div class="col-md-6">				<div class="form-group">				 <select class="form-control" id="estadocivil" name="estadocivil">    					<optgroup label="Estado Civil">                 					<option value="Solteiro(a)">Solteiro(a)</option>                   					<option value="Casado(a)">Casado(a)</option>                   					<option value="Viúvo(a)">Viúvo(a)</option>                   					<option value="Disquitado(a)">Disquitado(a)</option>   					</optgroup>				  </select>				</div>			</div>					</div>	</div>	    <br />
	<div class="row">		
		<div class="col-md-12">
			<h5>Cidade (selecione o estado primeiro) </h5>
			<div class="col-md-6">
				<div class="form-group">
				  <select class="form-control" id="txtEstado" name="estado">      
					<optgroup label="Estados">
                    <?php
                    foreach ($estados->result() as $row) {
                        echo "<option value='$row->codEstado'>$row->descricao</option>";
                    }
                    ?>					</optgroup>
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
    <div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon">@</span>
				  <input type="text" name="email" id="email" class="form-control" placeholder="E-mail">
				</div>
			</div>
			<div class="col-md-6">	
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span></span>
				  <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF" data-inputmask='"mask": "999.999.999-99"' data-mask>
				</div>
			</div>
		</div>
	</div>
    <br>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></span>
				  <input type="text" name="rg" id="rg" class="form-control" placeholder="RG">
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></span>
				  <input type="text" name="batismo" id="batismo" class="form-control" placeholder="Data de Batismo" data-inputmask='"mask": "99/99/9999"' data-mask>
				</div>
			</div>
		</div>
	</div>
    <br>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="input-group">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></span>
				  <input type="text" name="admissao" id="admissao" class="form-control" placeholder="Data de Admisão" data-inputmask='"mask": "99/99/9999"' data-mask>
				</div>
			</div>			
		</div>
	</div>	
	<div class="row">		
		<div class="col-md-12">
			<h5>Natural de: </h5>
			<div class="col-md-6">
				<div class="form-group">
				  <select class="form-control" id="estado" name="txtEstado">      
					<option value="0">Selecione...</option>
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
				  <select class="form-control" id="txtNaturalidade" name="naturalidade">      
					<option>Selecione o Estado</option>					
				  </select>
				</div>
			</div>
		</div>
	</div>
	<div class="row">		
		<div class="col-md-12">			
			<div class="col-md-6">
				<div class="form-group">
				<label>Sexo</label>
				  <div class="radio">
					<label>
					  <input type="radio" name="sexo" id="optionsRadios1" value="F" checked>
					  Feminino
					</label>
				  </div>
				  <div class="radio">
					<label>
					  <input type="radio" name="sexo" id="optionsRadios2" value="M">
					  Masculino
					</label>
				  </div>      
				</div>
			</div>
		</div>
	</div>
	
	<input type="hidden" name="txtCod" id="txtCod">
	
	<div class="row">		
		<div class="col-md-12">			
			<div class="col-md-6">
				<div class="form-group">
				<label>Cor</label>
				  <select class="form-control" id="cor" name="cor">      
					<option>Selecione...</option>
					<option value="branco">Branco(a)</option>
					<option value="negro">Negro(a)</option>
					<option value="pardo">Pardo(a)</option>
					<option value="amarelo">Amarelo(a)</option>
					
				  </select>
				</div>
			</div>
			<div class="col-md-6">	
				<div class="form-group">
				  <label>Cargo</label>
				  <select class="form-control" id="cargo" name="cargo">      
					<option>Selecione...</option>
					<?php
                    foreach ($cargos->result() as $row) {
                        echo "<option value='$row->idCargo'>$row->descricao</option>";
                    }
                    ?>
				  </select>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">		
		<div class="col-md-12">			
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputFile">Foto 3x4</label>
					<input type="file" id="userfile" name="userfile">
					<p class="help-block">Selecione uma foto</p>
				</div>
			</div>
			<div class="col-md-6">	
				<div class="form-group">
				  <label>Congregacao</label>
				  <select class="form-control" id="congregacao" name="congregacao">      
					<option>Selecione...</option>
					<?php
                    foreach ($cong->result() as $row) {
                        echo "<option value='$row->idCongregacao'>$row->descricao</option>";
                    }
                    ?>
				  </select>
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
		
		$("#estado").change(function () {
            if ($("#estado :selected").val() !== "") {

                $('#txtNaturalidade').empty();
                $('#txtNaturalidade').html('Carregando....');
                var idestado = $("#estado :selected").val();

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
                    $("#txtNaturalidade").append(html);
                    $("#estado").val(idestado);
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