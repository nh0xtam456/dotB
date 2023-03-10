<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

<div class="card card-info">
<div class="card-header">
<h3 class="card-title">This Customer Also Buy </h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
<div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
<canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<script src="custom/modules/Accounts/tpls/Chart.min.js"></script>

{* Jquery ko đọc được biến truyền vào TPL nên sẽ tạo div ẩn ở trên tpl rồi get class ở div đó 
truyền xuống jquery *}
</div>
{literal}
  

<script>

  
$(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    $.ajax({
      type:"POST",
      url: "http://localhost/SugarCE-Full-6.5.26/SugarCE-Full-6.5.26/index.php?module=Accounts&action=product&sugar_body_only=true",
      success: function(result){
        console.log(result)            
        var labels1 = [];

        result.forEach(function(value){
          console.log(value.name)
          labels1.push(value.name)
        })
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
          labels: labels1,
          datasets: [
            {
              data: [700,500],
              backgroundColor : ['#f56954', '#00a65a'],
            }
          ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })


        console.log(typeof(labels1))
}})
    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
      }      )

</script>
{/literal}