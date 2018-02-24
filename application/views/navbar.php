<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>I</b>DI</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Igreja</b>DEIgrejas</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-print" data-toggle="modal" data-target="#myModal2" style="font-size:21px;"></i>
                  <span class="label label-success"></span>
                </a>
                <!--ul class="dropdown-menu">
                  <li class="header">Imprimir Carteirinhas</li>
                </ul-->
              </li>
			  
			  
			  
              <!-- Notifications: style can be found in dropdown.less >
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data >
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less >
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data >
                    <ul class="menu">
                      <li><!-- Task item >
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item >
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url("assets/img/user2-160x160.jpg");?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['usuario'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url("assets/img/user2-160x160.jpg");?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['usuario'];?>
                      <small</small>
                    </p>
                  </li>
                  <!-- Menu Body >
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li-->
                  <!-- Menu Footer -->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('index.php/login/logout');?>" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button>
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li-->
            </ul>
          </div>
        </nav>
      </header>
	  <!-- Modal -->
			<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal title</h4>
				  </div>
				  <form id="demo-form2"enctype="multipart/form-data" method="POST" action="<?php echo base_url('index.php/membro/carteirinha') ?>">
				  <div class="modal-body">
						<div class="row">
							<div class="col-md-6">    
								<div class="form-group">
									<label>Selecione os membros para imprimir</label>
									<select class="form-control select2" multiple="multiple" style="width: 100%;" name="txtMembro" id="txtMembro">
									  <?php
									foreach ($membros_carteirinha->result() as $row) {
										echo "<option value='$row->idMembro'>$row->nome</option>";
									}
									?>
									</select>
								</div>
							</div>
						</div>
						<input type="hidden" name="texte" id="texte" />
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary imprimir">Imprimir</button>
				  </div>
				  </form>
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
		
		$(".select2").change(function(){
			$('#texte').val($(".select2").val());
			console.log($('#texte').val());
			
		});		
		/*$(".imprimir").click(function(){		
			
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
		});*/
});
</script>