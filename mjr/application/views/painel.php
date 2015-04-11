</div>
<div class="col-lg-10  espacoTopo conteudoPrincipal">
	<script type="text/javascript" src="<?php echo base_url("utils/js/chart.js");?>"></script>
	<script type="text/javascript">
		google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

var data = google.visualization.arrayToDataTable([
['', ''],
['Janeiro',     <?php echo $relatorio[1][0]['COUNT(*)'] ?> ],
['Fevereiro',     <?php echo $relatorio[2][0]['COUNT(*)'] ?>  ],
['Março',  <?php echo $relatorio[3][0]['COUNT(*)'] ?> ],
['Abril', <?php echo $relatorio[4][0]['COUNT(*)'] ?> ],
['Maio', <?php echo $relatorio[5][0]['COUNT(*)'] ?> ],
['Junho',   <?php echo $relatorio[6][0]['COUNT(*)'] ?>  ],
['Julho',   <?php echo $relatorio[7][0]['COUNT(*)'] ?> ],
['Agosto',   <?php echo $relatorio[8][0]['COUNT(*)'] ?> ],
['Setembro',   <?php echo $relatorio[9][0]['COUNT(*)'] ?> ],
['Outrubro',   <?php echo $relatorio[10][0]['COUNT(*)'] ?> ],
['Novembro',   <?php echo $relatorio[11][0]['COUNT(*)'] ?> ],
['Dezembro',   <?php echo $relatorio[12][0]['COUNT(*)'] ?>
	],
	]);

	var options = {
		title : ''
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart'));

	chart.draw(data, options);
	}
	</script>
	
	<div class="col-lg-12">
		<div class="col-lg-12 painelAnual">
			<h3>
				Quantidade todal de eventos durante o ano de 2014  <span class="label label-success">
					
				<?php echo ( $relatorio[1][0]['COUNT(*)'] 
																			+  $relatorio[2][0]['COUNT(*)']
																			+  $relatorio[3][0]['COUNT(*)']
																			+  $relatorio[4][0]['COUNT(*)']
																			+  $relatorio[5][0]['COUNT(*)']
																			+  $relatorio[6][0]['COUNT(*)']
																			+  $relatorio[7][0]['COUNT(*)']
																			+  $relatorio[8][0]['COUNT(*)']
																			+  $relatorio[9][0]['COUNT(*)']
																			+  $relatorio[10][0]['COUNT(*)']
																			+  $relatorio[11][0]['COUNT(*)']
																			+  $relatorio[12][0]['COUNT(*)']
																				);?> Eventos
				</span> 
			</h3>
			<br />
		</div>
		<br />
		<div class="col-lg-6" >
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4> Relatório Anual </h4>
				</div>
	
				<div id="piechart" style=" height: 500px;"></div>
			</div>
		</div>
		
		<div class="col-lg-6 painelRelatorio">
				<div class="panel panel-default">
					<div class="panel-heading tblRelatorios painelRelatorio">
						<h4>Quantidade de Eventos Por Mês</h4>
					</div>
					<table class="table">
						<thead>
							<tr class="tblRelatorios">
								<th class="tblRelatorios"> Mês </th>
								<th class="tblRelatorios"> Quantidade </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th class="tblRelatorios"> Janeiro </th>
								<th class="tblRelatorios"> <?php echo $relatorio[1][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> Fevereiro </th>
								<th class="tblRelatorios"> <?php echo $relatorio[2][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> Março </th>
								<th class="tblRelatorios"> <?php echo $relatorio[3][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> Abril </th>
								<th class="tblRelatorios"> <?php echo $relatorio[4][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> Maio </th>
								<th class="tblRelatorios"> <?php echo $relatorio[5][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> Junho </th>
								<th class="tblRelatorios"> <?php echo $relatorio[6][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> julho </th>
								<th class="tblRelatorios"> <?php echo $relatorio[7][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> Agosto </th>
								<th class="tblRelatorios"> <?php echo $relatorio[8][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> Setembro </th>
								<th class="tblRelatorios"> <?php echo $relatorio[9][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> Outubro </th>
								<th class="tblRelatorios"> <?php echo $relatorio[10][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> Novembro </th>
								<th class="tblRelatorios"> <?php echo $relatorio[11][0]['COUNT(*)'] ?> </th>
							</tr>
							<tr>
								<th class="tblRelatorios"> Dezembro </th>
								<th class="tblRelatorios"> <?php echo $relatorio[12][0]['COUNT(*)'] ?> </th>
							</tr>
						</tbody>
					</table>
				</div>
				<br />
				<br />
				<br />
				
			</div>
	</div>
	
	
</div>
</div>
</body>
</html>
