<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chart Radar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="panel-group" id="accordion">

            	<?php $no =1;
            	$tanggal = '';
            	foreach ($getIdRadar as $getIdRadar) {
            		$id = $getIdRadar->id_radar;
            		$nama = $getIdRadar->nama_radar;
            		$standar = $getIdRadar->standar;
            		
					$x= 'chart'.$id;
					
								$datachart = ${$x};
								foreach ($datachart as $datachart) {
									$tanggal = $tanggal."'".$datachart->tanggal."' ,";
									$p = $datachart->pembacaan;
									if ($p == '-') {
										${'pembacaan'.$id}[] = 0;
									}else{
										${'pembacaan'.$id}[] = $p;
									}
								}
					?>
					    <div class="panel panel-default">
					      <div class="panel-heading">
					        <h4 class="panel-title">
					          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $id ?>"><?php echo $nama; ?></a>
					        </h4>
					      </div>
					      <div id="collapse<?php echo $id ?>" class="panel-collapse collapse <?php if($no==1){ echo 'in'; $no++;} ?>">
					        <div class="panel-body" >
					        	<div id="container<?php echo $id ?>"></div>
					        	<?php 
					   //      	echo "<pre>";
								// print_r(${$x});
								// echo "</pre>"; 
								?>
					        </div>
					      </div>
					    </div>
						<script type="text/javascript">
						Highcharts.chart('container<?php echo $id ?>', {

						    title: {
						        text: 'Grafik <?php echo $nama; ?>'
						    },

						    subtitle: {
						        text: 'Source: BMKG MLATI YOGYAKARTA'
						    },

						    yAxis: {
						        title: {
						            text: '<?php echo $standar; ?>'
						        },
						    },
						    xAxis:{
						    	 categories:[<?php echo $tanggal; ?>]
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
						        name: '<?php echo $nama; ?>',
						        data: [<?php $pemb = ${'pembacaan'.$id};
						        	echo join($pemb, ",") ?>]
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
