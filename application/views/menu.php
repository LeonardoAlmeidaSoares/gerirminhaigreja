      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar hidden-print">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!--div class="user-panel">
            <div class="pull-left image">
              <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!--form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU PRINCIPAL</li>
            <li class="treeview">
              <a href="<?php echo base_url();?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>              
            </li>         
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Membros</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url("index.php/membro/cadastro");?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                <li><a href="<?php echo base_url("index.php/membro/listar");?>"><i class="fa fa-circle-o"></i> Listar/Gerenciar</a></li>
              </ul>
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-user-secret"></i>
                <span>Cargos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url("index.php/cargo/cadastro");?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                <li><a href="<?php echo base_url("index.php/cargo/listar");?>"><i class="fa fa-circle-o"></i> Listar/Gerenciar</a></li>
              </ul>
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-puzzle-piece"></i>
                <span>Departamentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url("index.php/departamento/cadastro");?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Gerenciar</a></li>
              </ul>
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Congregados</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url("index.php/congregado/cadastro");?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Gerenciar</a></li>
              </ul>
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-bank"></i>
                <span>Congregações</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url("index.php/congregacao/cadastro");?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                <li><a href="<?php echo base_url("index.php/congregacao/listar");?>"><i class="fa fa-circle-o"></i> Listar/Gerenciar</a></li>
              </ul>
            </li>
			</ul>			<ul class="sidebar-menu">				<li class="header">ADMIN SITE</li>				<li class="treeview">				  <a href="<?php echo base_url();?>">					<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>				  </a>				</li>				<li class="treeview">					<a href="#">						<i class="fa fa-image"></i>						<span>Slides</span>						<i class="fa fa-angle-left pull-right"></i>					</a>					<ul class="treeview-menu">						<li><a href="<?php echo base_url("index.php/site/cadastrarSlides");?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>						<li><a href="<?php echo base_url("index.php/site/listarSlides");?>"><i class="fa fa-circle-o"></i> Listar/Gerenciar</a></li>					</ul>				</li>								<li class="treeview">					<a href="#">						<i class="fa fa-newspaper-o"></i>						<span>Notícias</span>						<i class="fa fa-angle-left pull-right"></i>					</a>					<ul class="treeview-menu">						<li><a href="<?php echo base_url("index.php/site/cadastrarNoticia");?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>						<li><a href="<?php echo base_url("index.php/site/listarNoticias");?>"><i class="fa fa-circle-o"></i> Listar/Gerenciar</a></li>					</ul>				</li>								<li class="treeview">					<a href="#">						<i class="fa fa-tags"></i>						<span>Posts</span>						<i class="fa fa-angle-left pull-right"></i>					</a>					<ul class="treeview-menu">						<li><a href="<?php echo base_url("index.php/site/cadastrarPost");?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>						<li><a href="<?php echo base_url("index.php/site/listarPosts");?>"><i class="fa fa-circle-o"></i> Listar/Gerenciar</a></li>					</ul>				</li>								<li class="treeview">					<a href="#">						<i class="fa fa-calendar"></i>						<span>Eventos</span>						<i class="fa fa-angle-left pull-right"></i>					</a>					<ul class="treeview-menu">						<li><a href="<?php echo base_url("index.php/site/cadastrarEvento");?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>						<li><a href="<?php echo base_url("index.php/site/listarEventos");?>"><i class="fa fa-circle-o"></i> Listar/Gerenciar</a></li>					</ul>				</li>								<li class="treeview">					<a href="#">						<i class="fa fa-home"></i>						<span>Institucional</span>						<i class="fa fa-angle-left pull-right"></i>					</a>					<ul class="treeview-menu">						<li><a href="<?php echo base_url("index.php/site/institucional");?>"><i class="fa fa-circle-o"></i> Gerir</a></li>											</ul>				</li>			</ul>
        </section>
        <!-- /.sidebar -->
      </aside>