<body class="hold-transition login-page">
<div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>E</b>Church</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Login</p>
        <form action="<?php echo base_url('index.php/login/verificarAutenticacao');?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Usuário" name="login" id="login">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Lembrar Senha
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          </div>
        </form>   

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

   
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>