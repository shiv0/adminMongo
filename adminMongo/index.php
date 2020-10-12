
  <?php
    $active ='Index';
 include('header.php');





$dataPoints = array( 
    array("label"=>"Card", "y"=>6.8),
    array("label"=>"User", "y"=>6.8),
    array("label"=>"State", "y"=>6.8),
    array("label"=>"City", "y"=>6.8),
    array("label"=>"Qualification", "y"=>4.7),
    array("label"=>"Payment", "y"=>2)
);


 
?>


<body>
  
  <script type="text/javascript">  
      


window.onload = function() {
     

 
var chart = new CanvasJS.Chart("chartContainers", {
    animationEnabled: true,
    title: {
        text: "Testing"
    },
    subtitles: [{
       
    }],
    data: [{
        type: "pie",
        yValueFormatString: "#,##0.00\"%\"",
        indexLabel: "{label} ({y})",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 



}

</script>


    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                
                                <ul class="tabs tab-pills">
                                   
                                </ul>
                            </div>

                            <div class="widget-content">
                                <div class="tabs tab-content">
                                    <div id="content_1" class="tabcontent" > 
                                        <div id="chartContainers" style="height:500px;width:600px;"></div>
                                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                 
                    </div>

                  
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 , All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
   <?php
   include('script.php');
   ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>