<section class="content-header">
  <h1>
    Monitor
    <small>de pelos</small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
    <div class="row">
    	<div class="col-lg-3 col-xs-6">
        	<!-- small box -->
          	<div class="small-box bg-aqua">
            	<div class="inner">
              		<h3>3</h3>
              <p>Avisos de peluqueria</p>
            </div>
            
            <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>5</h3>

              <p>Avisos de vacuna</p>
            </div>            
            <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>2</h3>

              <p>Aviso de agenda</p>
            </div>            
            <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo sizeof($alarmasStock);?></h3>

              <p>Alarmas de stock</p>
            </div>
            
            <!--<a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>-->
            <center>
            <button type="button" class="small-box-footer" data-toggle="modal" data-target="#myModal">
            <span class="fa fa-arrow-circle-right"></span>
  			Ver
			</button>
			</center>
          </div>
        </div>
        <!-- ./col -->
    </div>
	<div class="row">
		<div class="col-md-4">
		 	<div class="box box-info">
		        <div class="box-header with-border">
		          	<h3 class="box-title">Ingresos del mes</h3>

		          	<div class="box-tools pull-right">
		            	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		            	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		          	</div>
		        </div>
		        <!-- /.box-header -->
		        <div class="box-body">
		        	<?php 
		        		$sumaMontoProductos = 0;
		        		$sumaMontoServicios = 0;
		        		$sumaMontoTotal = 0;
		        	?>

		          	<div class="table-responsive">
		            	<table class="table no-margin">
		              		<thead>
				              	<tr>
				                	<th>Fecha</th>
				                	<th>Productos</th>
				                	<th>Servicios</th>
				                	<th>Monto</th>				                	
				              	</tr>
		              		</thead>
		              		<tbody>
		              		<?php foreach ($ingresos as $ingreso => $valor): ?>
		              			<tr>
		              				<?php
		              					$sumaMontoProductos += $valor['montoProductos'];
		              					$sumaMontoServicios += $valor['montoServicios'];
		              					$sumaMontoTotal += $valor['montoTotal'];
		              				?>
		                			<td><?= h($ingreso) ?></td>
		                			<td><?= $this->Number->format($valor['montoProductos'])?></td>
		                			<td><?= $this->Number->format($valor['montoServicios']) ?></td>
		                			<td><?= $this->Number->format($valor['montoTotal']) ?></td>
		              			</tr>		              			
		              			<?php endforeach; ?>
		              		</tbody>
		            	</table>
		          	</div>
		          <!-- /.table-responsive -->
		          	<table class="table no-margin"><tbody>
		              		<tbody>
		              			<tr>		                			
		                			<td>TOTAL</td>
		                			<td><?php echo $this->Number->format($sumaMontoProductos) ?></td>
		                			<td><?php echo $this->Number->format($sumaMontoServicios) ?></td>
		                			<td><?php echo $this->Number->format($sumaMontoTotal) ?></td>
		              			</tr>		              					              			
		              		</tbody>
		             </table>
		        </div>

		        <!-- /.box-body -->
		        <div class="box-footer clearfix">
		        <?= $this->Html->link(__('Nuevo ingreso', true), array('controller' => 'Ingresos','action' => 'add'), array('class' => 'btn btn-sm btn-info btn-flat pull-left')); ?> 
		        <?= $this->Html->link(__('Ver todos los ingresos', true), array('controller' => 'Ingresos','action' => 'index'), array('class' => 'btn btn-sm btn-default btn-flat pull-right')); ?> 

		          
		        </div>
		        <!-- /.box-footer -->
		     </div>
	      <!-- /.box -->
	    </div>	    
	    <!-- /.col -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Capital</span>
              <span class="info-box-number"><?php echo $capital?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-warning"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Gasto</span>
              <span class="info-box-number"><?php echo $gasto?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-bank"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Transferencias</span>
              <span class="info-box-number"><?php echo $montoTransferencia?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Efectivo</span>
              <span class="info-box-number"><?php echo $montoEfectivo?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>

	    <!-- BAR CHART -->
	    <div class="col-md-8">
          	<div class="box box-success">
            	<div class="box-header with-border">
              		<h3 class="box-title">Bar Chart</h3>
          			<div class="box-tools pull-right">
            			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            			</button>
            			<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          			</div>
           		 </div>
            	<div class="box-body">
              		<div class="chart">
                		<canvas id="barChart" style="height:230px"></canvas>
              		</div>
            	</div>
            <!-- /.box-body -->
          	</div>
          <!-- /.box -->
        </div>
	</div>
</section>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Productos con alarma de stock</h4>
      </div>
      <div class="modal-body">
        	<div class="table-responsive">
            	<table class="table no-margin">
              		<thead>
		              	<tr>
		                	<th>Nombre</th>
		                	<th>Stock</th>		                	
		                	<th>Alarma Stock</th>				                	
		              	</tr>
              		</thead>
              		<tbody>
              		<?php foreach ($alarmasStock as $alarma): ?>
              			<tr>
                			<td><?= h($alarma['nombre']) ?></td>
                			<td><?= h($alarma['stock']) ?></td>
                			<td><?= h($alarma['alerta_stock']) ?></td>                			
              			</tr>		              			
              			<?php endforeach; ?>
              		</tbody>
            	</table>
          	</div>
          <!-- /.table-responsive -->
      </div>      
    </div>
  </div>
</div>


<?php
$this->Html->script([
  'AdminLTE./plugins/chartjs/Chart.min',
],
['block' => 'script']);
?>


<?php $this->start('scriptBottom'); ?>
<!-- page script -->
<script>
  $(function () {
      
    var l= <?php echo json_encode($labels ); ?>;
    var montos= <?php echo json_encode($montos ); ?>;
    
    var areaChartData = {
      labels: l,
      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: montos
        }
      ]
    };

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[0].fillColor = "#00a65a";
    barChartData.datasets[0].strokeColor = "#00a65a";
    barChartData.datasets[0].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
<?php  $this->end(); ?>
