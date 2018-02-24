<style>
@media print {
	.img_membro{
		width:50px !important;
	}
	.form-control{
		width:50% !important;
	}
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
			Listar Membros
            <small>Lista de Membros Cadastrados</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo base_url("index.php/membro/listar");?>">Membros</a></li>
          <li class="active">Listar</li>
        </ol>
    </section>
	<!-- Main content -->
	<section class="content hidden-print">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Membros Cadastrados</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						 <table id="example2" class="table table-bordered table-hover">
							<thead>
							  <tr>
								<th>Nome</th>
								<th>Telefone</th>
								<th>Email</th>
								<!--th>Foto</th-->
								<th>Ações</th>
							  </tr>
							</thead>
							<tbody>
							<?php 
								foreach ($membros->result() as $row) {
								if ($row->status==0){
									$style="color:#ccc;";
								}else{
									$style="";
								}
							?>
							  <tr style="<?php echo $style;?>">
								<td><?php echo $row->nome; ?></td>
								<td><?php echo $row->telefone; ?></td>
								<td><?php echo $row->email; ?></td>
								<!--td><img src="<?php #echo $row->foto; ?>" style="width:80px;"></td-->
								<td>
									<i class="fa fa-eye" u="<?php echo $row->idMembro; ?>" title="Visualizar" data-toggle="modal" data-target="#myModal"></i>&nbsp
									<i class="fa fa-edit edit" u="<?php echo $row->idMembro; ?>" title="Editar" data-toggle="modal" data-target="#myModal"></i>&nbsp
									<?php if ($row->status==0){ ?>
										<i class="fa fa-check btnAtivar" u="<?php echo $row->idMembro; ?>" title="Ativar"></i>	
									<?php } else { ?>
										<i class="fa fa-remove btnRemove" u="<?php echo $row->idMembro; ?>" title="Inativar"></i>									
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
	<form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/membro/alterar') ?>">
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
				  <select class="form-control" id="estadoNatual" name="txtEstadoNatual">      
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
					  <input type="radio" name="sexo" id="optionsRadios" value="F" checked>
					  Feminino
					</label>
				  </div>
				  <div class="radio">
					<label>
					  <input type="radio" name="sexo" id="optionsRadios" value="M">
					  Masculino
					</label>
				  </div>      
				</div>
			</div>
		</div>
	</div>
	
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

	function setarCidade(el1, el2, value){
		$est = el1;
		//$cid = el2;
		console.log(el2);
		$.ajax({
			url: "<?php echo base_url("index.php/cidade/getCidades"); ?>",
			data: {
				idEstado: $est
			},
			error: function (request, status, error) {
				alert(request.responseText);
			},
			type: "POST",
			cache: false
		}).success(function (html) {
			//alert(html);
			$("#"+el2).append(html).val(value);
		});
	}
	
	function getData(cod){
		$.ajax({				
				url: "<?php echo base_url("index.php/membro/getMembro");?>",
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
				//$(".frmCadasr").show("slow");
				
				var res = html.split("&");
				
				var nome=res[0]; 
				var nascimento=res[1];
				var logradouro=res[2];
				var numero=res[3];
				var bairro=res[4];
				var complemento=res[5];
				var idCidade=res[6];
				var cep=res[7];
				var telefone=res[8];
				var email=res[9];
				var cpf=res[10];
				var rg=res[11];
				var batismo=res[12];
				var admissao=res[13];
				var idNaturalidade=res[14];
				var sexo=res[15];
				var cor=res[16];
				var idCargo=res[17];
				var idCongregacao=res[18];
				var foto=res[19];
				var idEstadoNaturalidade=res[20];
				var idEstadoAtual=res[21];
				
				$("#txtEstado").val(idEstadoNaturalidade);
				
				$("#nome").val(nome);
				$("#nascimento").val(nascimento.split('-').reverse().join('/'));
				$("#logradouro").val(logradouro);
				$("#numero").val(numero);
				$("#bairro").val(bairro);
				$("#complemento").val(complemento);
				$("#congregacao").val(idCongregacao);
				$("#cor").val(cor);
				$("#cargo").val(idCargo);
				$("#cep").val(cep);
				$("#telefone").val(telefone);
				$("#email").val(email);
				$("#cpf").val(cpf);
				$("#rg").val(rg);
				$("#batismo").val(batismo.split('-').reverse().join('/'));
				$("#admissao").val(admissao.split('-').reverse().join('/'));	
				$("#img_membro").attr("src",foto);
				$("#txtCod").val(cod);
				$('input:radio[value='+sexo+']').prop('checked', true);
				$("#estadoNatual").val(idEstadoAtual);
				setarCidade(idEstadoAtual, "txtCidade", idCidade);
				setarCidade(idEstadoNaturalidade, "txtNaturalidade", idNaturalidade);
			});
	}

    $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
		
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
			var r = confirm("Deseja INATIVAR o membro?");
			if (r == true){			
			$.ajax({
                url: "<?php echo base_url("index.php/membro/inativar"); ?>",
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
                url: "<?php echo base_url("index.php/membro/inativar"); ?>",
                data: {
                    cod : cod,
					status: 1
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                },
                type: "POST"
            }).success(function (html) {
				alert("Membro ativado com sucesso");
				location.reload();
			});
			}
		});
		
		
		
    });
</script>