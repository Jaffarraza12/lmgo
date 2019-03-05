<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChartbymonth);
	  google.setOnLoadCallback(drawChartbyuser);
	  google.setOnLoadCallback(drawChartbyemirate);
      function drawChartbymonth() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Ads'],
		  
		  <?php 
		  $i=0;
		  foreach($reportformonth as $key=>$val):
		  	$comma=(count($reportformonth) != ++$i ) ? ',' : '';
		  	echo "['".$key."',".$val."]" . $comma;
		  endforeach;
		  ?>
         
         
        ]);

        var options = {
          title: 'Dubazaaro.com Ads Report By Month',
          hAxis: {title: 'Months', titleTextStyle: {color: 'black'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_month'));
        chart.draw(data, options);
      }
	  
	  function drawChartbyuser() {
        var data = google.visualization.arrayToDataTable([
          ['user', 'Ads'],
		  
		  <?php 
		  $i=0;
		  foreach($reportforuser as $user):
		  	$comma=(count($reportforuser) != ++$i ) ? ',' : '';
		  	echo "['".$user->firstname.' '.$user->lastname ."',".$user->adspost."]" . $comma;
		  endforeach;
		  ?>
         
         
        ]);

        var options = {
          title: 'Dubazaaro.com Top Users by Ads Posting',
          hAxis: {title: 'Users', titleTextStyle: {color: 'black'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_user'));
        chart.draw(data, options);
      }
	  
	    function drawChartbyemirate() {
        var data = google.visualization.arrayToDataTable([
          ['Emirates', 'Ads'],
		  
		  <?php 
		  $i=0;
		  foreach($reportforemirate as $key=>$val):
		  	$comma=(count($reportforemirate) != ++$i ) ? ',' : '';
		  	echo "['".$key."',".$val."]" . $comma;
		  endforeach;
		  ?>
         
         
        ]);

        var options = {
          title: 'Dubazaaro.com Ads By Emirates',
          hAxis: {title: 'Emirates', titleTextStyle: {color: 'black'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_emirate'));
        chart.draw(data, options);
      }
	  
	  
	  
	  
	  
    </script>
<?php // print_r($reportforuser) ?>
<div class="row-fluid">
    <div class="span12">
        <h3>Dubazaaro.com Ads Report</h3>

        <!-- BEGIN FORM-->
        <form action="Add" method="GET" class="form-horizontal" enctype="multipart/form-data">

        
            <div class="tabbable tabbable-custom">

                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-report"></i>
                            Ads Record by Month	
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div id="chart_month" style="width: 900px; height: 500px;"></div>


                    </div>
                </div>
                
                
                
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-report"></i>
                            Top User By Number of Posted Ads..
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div id="chart_user" style="width: 900px; height: 500px;"></div>


                    </div>
                </div>
                
                
                     <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-report"></i>
                           Ads By Region..
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div id="chart_emirate" style="width: 1100px; height: 500px;"></div>


                    </div>
                </div>

            </div>

        </form>
        <!-- END FORM-->

    </div>
</div>
