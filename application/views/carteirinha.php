<html>
	<head>
		<title>
			Teste - Carteirinha
		</title>
	</head>
	<style>
		body{
			font-size: 12px;
		}
		.img-cartao{
			width:450px;
			height:auto;
		}
		.cartao{
			float:left;
			margin:10px;
		}
		.absolut{
			position:absolute;
		}
		.cod{
			margin-top: -230px;
			margin-left: 95px;
		}
		.nome{
			margin-top: -80px;
			margin-left: 16px;
		}
		.foto{
			margin-top: -206px;
			margin-left: 65.3px;
			width: 94px;
			height: 108px;
		}
		.cargo{
			margin-top: -56px;
			margin-left: 73px;
		}
		.congregacao{
			margin-top:-30px;
			margin-left:73px;
		}
		.nascimento{
			margin-top: -300px;
			margin-left: 256px;
		}
		.estcivil{
			margin-top: -300px;
			margin-left: 358px;
		}
		.naturalidade{
			margin-top: -272px;
			margin-left: 251px;
		}
		.doc{
			margin-top: -243px;
			margin-left: 251px;
		}
		.pai{
			margin-top: -215px;
			margin-left: 251px;
		}
		.mae{
			margin-top: -188px;
			margin-left: 251px;
		}
		.batismo{
			margin-top: -159px;
			margin-left: 251px;
		}
		.admissao{
			margin-top: -159px;
			margin-left: 353px;
		}
		.emissao{
			margin-top: -102px;
			margin-left: 311px;
		}
		
	</style>
	<body>
		<?php 
			foreach($membros->result() as $linha){
		?>
		<div class="cartao">
			<img src="<?php echo base_url('assets/img/cartao.jpg'); ?>" class="img-cartao">
			<span class="cod absolut"><?php echo $linha->idMembro; ?></span>
			<img class="foto absolut" src="<?php echo$linha->foto; ?>">
			<span class="nome absolut"><?php echo $linha->nome; ?></span>
			<span class="cargo absolut"><?php #echo $linha->cargo; ?>Membro</span>
			<span class="congregacao absolut"><?php #echo $linha->Congregacao; ?>Sede</span>
			<span class="nascimento absolut"><?php echo $linha->nascimento; ?></span>
			<span class="estcivil absolut"><?php echo $linha->estadocivil; ?></span>
			<span class="naturalidade absolut"><?php #echo $linha->Naturalidade; ?>Vieiras-MG</span>
			<span class="doc absolut"><?php echo $linha->cpf; ?></span>
			<span class="pai absolut"><?php echo $linha->pai; ?></span>
			<span class="mae absolut"><?php echo $linha->mae; ?></span>
			<span class="batismo absolut"><?php echo $linha->batismo; ?></span>
			<span class="admissao absolut"><?php echo $linha->admissao; ?></span>
			<span class="emissao absolut"><?php echo date('d/m/Y'); ?></span>
		</div>	
			<?php } ?>
	</body>
<html>