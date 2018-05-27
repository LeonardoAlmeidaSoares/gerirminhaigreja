
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cadastrar Congregado
            <small>Insira um novo Congregado</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Congregados</a></li>
            <li class="active">Cadastrar</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">

        	<div class="row">

			<div class="col-xs-12">

				<div class="box">

					<div class="box-header">

						<h3 class="box-title">Cargos Cadastrados</h3>

					</div>

					<div class="box-body">   
						<div class="col-xs-12">                  
							<canvas id="myChart1">oi</canvas>
						</div> 
					</div>

				</div>

			</div>

			<div class="col-xs-6">

				<div class="box">

					<div class="box-header">

						<h3 class="box-title">Total de Entradas</h3>

					</div>

					<div class="box-body">   
						<div class="col-xs-12">                  
							<canvas id="myChart2">oi</canvas>
						</div> 
					</div>

				</div>

			</div>

			<div class="col-xs-6">

				<div class="box">

					<div class="box-header">

						<h3 class="box-title">Total de Saídas</h3>

					</div>

					<div class="box-body">   
						<div class="col-xs-12">                  
							<canvas id="myChart3">oi</canvas>
						</div> 
					</div>

				</div>

			</div>

		</div>

        	
        </section>
    </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script>
	$(function(){

		var cores = [
			'rgba(255, 0, 0, 0.2)',
			'rgba(0, 255, 0, 0.2)',
			'rgba(0, 0, 255, 0.2)',
			'rgba(127, 127, 0, 0.2)',
			'rgba(255, 120, 0, 0.2)'
		]
		var ctx1 = document.getElementById("myChart1").getContext('2d');
		var myChart = new Chart(ctx1, {
		    type: 'bar',
		    data: {
		        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
		        datasets: [{
		            label: 'Entradas',
		            data: [12, 19, 3, 5, 2, 3, 8, 5, 3, 8, 6, 1],
		            backgroundColor: [
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(54, 162, 235, 0.2)'
		            ],
		            borderColor: [
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(54, 162, 235, 1)'
		            ],
		            borderWidth: 1
		        },
		        {
		            label: 'Saídas',
		            data: [14,5,9,6,3,7,2,8,1,7,2,6],
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(255, 99, 132, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)',
		                'rgba(255,99,132,1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});

		var ctx2 = document.getElementById("myChart2").getContext('2d');
		var myChart2 = new Chart(ctx2, {
		    type: 'pie',
			data: {
				datasets: [{
					data: [4,9,5,3,7],
					backgroundColor: cores,
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow',
					'Green',
					'Blue'
				]
			},
			options: {
				responsive: true
			}
		});

		var ctx3 = document.getElementById("myChart3").getContext('2d');
		var myChart3 = new Chart(ctx3, {
		    type: 'pie',
			data: {
				datasets: [{
					data: [13,8,9,20,15],
					backgroundColor: cores,
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow',
					'Green',
					'Blue'
				]
			},
			options: {
				responsive: true
			}
		});
	});

</script>