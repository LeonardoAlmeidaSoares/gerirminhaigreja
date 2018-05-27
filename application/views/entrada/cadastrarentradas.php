<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cadastrar Entrada
            <small>Insira uma nova entrada</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Entradas</a></li>
            <li class="active">Cadastrar</li>
        </ol>
    </section>
    <section class="content">

        <!-- Input addon -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Entradas</h3>
            </div>
            <div class="box-body">
                <form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/entrada/cadastrar') ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>
                                    <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição da Entrada" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">				
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                    <input type="text" name="data_entrada" id="data_entrada" class="form-control" placeholder="Data de Entrada" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">		
                        <div class="col-md-12">			
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Congragação</label>
                                    <select class="form-control" id="congregacacao" name="congregacao">      
                                        <option>Selecione...</option>
                                        <?php
                                        foreach ($congrecacoes->result() as $row) {
                                            echo "<option value='$row->idCongregacao'>$row->descricao</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipo Entrada</label>
                                    <select class="form-control" id="tipo" name="tipo">      
                                        <option>Selecione...</option>
                                        <?php
                                        foreach ($tipo_entrada->result() as $row) {
                                            echo "<option value='$row->idTipoentrada'>$row->descricao</option>";
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
                                <label>Valor</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>
                                    <input type="text" name="valor" id="valor" class="form-control" placeholder="Valor da Entrada" required="required" valor-mask>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="btn-group">        
                        <input type="submit" class="btn btn-default" value="Salvar" />
                        <input type="button" class="btn btn-default" value="Cancelar" />        
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>
<script>
    $("[data-mask]").inputmask();
    $('#valor').mask('##########.00', {reverse: true});
</script>