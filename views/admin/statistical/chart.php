<div class="row">
<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
  <?php $countdn = count($chart_pr); $i=1; foreach($chart_pr as $chart):?>

    <?php if($i = $countdn) $fay =""; else $fay=","; echo "['".$chart['namedm']."',".$chart['slsp']."],"; $i+=1;?>

  <?php endforeach;?>
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Biểu đồ thống kê', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</div>