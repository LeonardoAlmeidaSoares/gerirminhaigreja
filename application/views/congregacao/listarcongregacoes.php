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
            <li><a href="<?php echo base_url("index.php/congragacao/listar"); ?>">Congregações</a></li>
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
                                            <i class="fa fa-eye" u="<?php echo $row->idCongregacao; ?>" title="Visualizar" data-toggle="modal" data-target="#myModal"></i>&nbsp
                                            <i class="fa fa-edit" u="<?php echo $row->idCongregacao; ?>" title="Editar" data-toggle="modal" data-target="#myModal"></i>&nbsp
                                            <i class="fa fa-remove" u="<?php echo $row->idCongregacao; ?>" title="Inativar"></i>
                                            <a style="color: black;text-decoration: none;" href="<?= base_url("index.php/membro/congregacao/$row->idCongregacao");?>"><i class="fa fa-list" title="Visualizar Membros"></i></a>
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
</div><!-- Modal --><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  <div class="modal-dialog" role="document">    <div class="modal-content">      <div class="modal-header">        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        <h4 class="modal-title" id="myModalLabel">Detalhes</h4>      </div>      <div class="modal-body">			<div class="row">				<div class="col-md-12">					<div class="col-md-4">						<button class="btn btn-default editar hidden-print"><i class="fa fa-edit" title="Editar"></i></button>&nbsp					</div>					<div class="col-md-4" style="text-align:center;">					</div>					<div class="col-md-4">					</div>				</div>			</div>			<br />			<br />			<form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/congregacao/alterar') ?>">				<div class="row">		<div class="col-md-12">				<div class="col-md-6">				<div class="input-group">				  <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>				  <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Nome/Descrição" required="required">				</div>					</div>			<div class="col-md-6">				<div class="input-group">				  <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>				  <input type="text" name="email" id="email" class="form-control" placeholder="E-mail">				</div>			</div>		</div>	</div>	<br />	<div class="row">		<div class="col-md-12">			<div class="col-md-6">				<div class="input-group">				  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>				  <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Logradouro">				</div>			</div>			<div class="col-md-6">    				<div class="input-group">				  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>				  <input type="text" name="numero" id="numero" class="form-control" placeholder="Número">				</div>			</div>		</div>	</div>	<br />    <div class="row">		<div class="col-md-12">			<div class="col-md-6">				<div class="input-group">				  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>				  <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro">				</div>			</div>			<div class="col-md-6">				<div class="input-group">				  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>				  <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento">				</div>			</div>		</div>	</div>    <br />	<div class="row">				<div class="col-md-12">			<h5>Cidade (selecione o estado primeiro) </h5>			<div class="col-md-6">				<div class="form-group">				  <select class="form-control" id="txtEstado" name="estado">      					<option value="0">Estado</option>                    <?php foreach ($estados->result() as $row) {
                                    echo "<option value='$row->codEstado'>$row->descricao</option>";
                                } ?>				  </select>				</div>			</div>			<div class="col-md-6">				<div class="form-group">				  <select class="form-control" id="txtCidade" name="cidade">      					<option>Cidade, Selecione o Estado...</option>									  </select>				</div>			</div>		</div>	</div>		<div class="row">		<div class="col-md-12">			<div class="col-md-6">				<div class="input-group">				  <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>				  <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP" data-inputmask='"mask": "99999-999"' data-mask>				</div>			</div>			<div class="col-md-6">				<div class="input-group">				  <span class="input-group-addon"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span></span>				  <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" data-inputmask='"mask": "(99) 9999-9999"' data-mask>				</div>			</div>		</div>	</div>	<br />				<input type="hidden" name="txtCod" id="txtCod">			</div>			<div class="modal-footer">				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>				<button type="submit" class="btn btn-primary">Salvar Alterações</button>			</div>    </div>			</form>	</div></div>

    <script>	function setarCidade(el1, el2, value){		$est = el1; //$cid = el2;		console.log(el2);		$.ajax({			url: "<?php echo base_url("index.php/cidade/getCidades"); ?>",			data: {				idEstado: $est			},			error: function (request, status, error) {				alert(request.responseText);			},			type: "POST",			cache: false		}).success(function (html) {			//alert(html);			$("#"+el2).append(html).val(value);		});	}	function getData(cod){		$.ajax({							url: "<?php echo base_url("index.php/congregacao/get"); ?>",				datatype: 'json',				data: {					cod: cod				},				error: function (request, status, error) {					alert(request.responseText);				},				type: "POST",				cache: false			}).success(function (html) { 							var res = html.split("&");				$("#txtEstado").val(res[0]);				//$("#txtCidade").val(res[1]);				$("#descricao").val(res[2]);				$("#logradouro").val(res[3]);				$("#numero").val(res[4]);				$("#bairro").val(res[5]);				$("#complemento").val(res[6]);				$("#cep").val(res[7]);				$("#telefone").val(res[8]);				$("#email").val(res[9]);								$("#txtCod").val(cod);								setarCidade(res[0], "txtCidade", res[1]);							});	}
        $(function () {
        $('#example2').DataTable({
        "paging": true,
                "lengthChange": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
        }); $(".fa-edit").click(function(){			var cod = $(this).attr("u"); //alert (cod);			$('.form-control').attr("disabled", false);			$('.editar').attr("disabled", true);			getData(cod);		});						$(".fa-eye").click(function(){			var cod = $(this).attr("u");			$('.form-control').attr("disabled", true);			$('.editar').attr("disabled", false);			getData(cod);		});				$(".editar").click(function(){			$('.form-control').attr("disabled", false);		});
        });
    </script>