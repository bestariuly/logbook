<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dasboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="panel-group" id="accordion">

            	<?php $no =1;
            	foreach ($getIdRadar as $getIdRadar) {
            		$id = $getIdRadar->id_radar;
					$x= 'chart'.$id;
					
					// for(${$x} as $chart){
					// 	$pembacaan[] = $chart->pembacaan;
					// }
					?>
					    <div class="panel panel-default">
					      <div class="panel-heading">
					        <h4 class="panel-title">
					          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $id ?>"><?php echo $id; ?></a>
					        </h4>
					      </div>
					      <div id="collapse<?php echo $id ?>" class="panel-collapse collapse <?php if($no==1){ echo 'in'; $no++;} ?>">
					        <div class="panel-body" id="container<?php echo $id ?>">
					        	<?php echo "<pre>";
					print_r(${$x});
					echo "</pre>"; ?>
					        </div>
					      </div>
					    </div>
						<script type="text/javascript">
						Highcharts.chart('container<?php echo $id ?>', {

						    title: {
						        text: 'Grafik '
						    },

						    subtitle: {
						        text: 'Source: BMKG MLATI YOGYAKARTA'
						    },

						    yAxis: {
						        title: {
						            text: 'Psi'
						        },
						    },
						    xAxis:{
						    	categories:[]
						    },
						    legend: {
						        layout: 'vertical',
						        align: 'right',
						        verticalAlign: 'middle'
						    },

						    plotOptions: {
						        series: {
						            label: {
						                connectorAllowed: false
						            },
						            
						        }
						    },

						    series: [{
						        name: 'Tekanan Dehydrator',
						        data: [<?php echo join($pembacaan, ",") ?>]
						    }],

						    responsive: {
						        rules: [{
						            condition: {
						                maxWidth: 500
						            },
						            chartOptions: {
						                legend: {
						                    layout: 'horizontal',
						                    align: 'center',
						                    verticalAlign: 'bottom'
						                }
						            }
						        }]
						    }
						});
						</script>
					<?php
            	} ?>
				</div> 

            </div>
            <!-- /.row -->
</div>
