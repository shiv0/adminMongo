 <?php
  $active ='viewpay';
include('header.php');

require 'vendor/autoload.php';
include('confiq.php');
  $db = $client->payment;
$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $limit = 3;
    $skip  = ($page - 1) * $limit;
    $next  = ($page + 1);
    $prev  = ($page - 1);
 $collection = $db->Cards;
 $sort  = array('createdAt' => -1);
  
   $cursor = $collection->find([],

    [
      'limit'=>$limit,
      'skip'=>$skip,
      'sort'=>$sort
    ]);

?>
  <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" >
                        <div class="widget-content widget-content-area br-6 " style="width:1000px;">
                            <div class="table-responsive mb-4 mt-4">
                                   <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                  
                        </div>
              
                    </form>
                    <br>
                                <table id="zero-config" class="table table-hover" >
                                    <thead>
                                         <th>Sr.no</th>
                                         <th>Teacher Email Id</th>
                  <th>Branch Email Id</th>
                  
                  <th>Status</th>
                  <th>Branch Name</th>
                  <th>Teacher Name</th>
                  <th>Value</th>
              
            
                   
                  
                                    </thead>
                                  <tbody id="getcl">
                  <?php
                $i=0;
 foreach ($cursor as $document) {
  $i++;
  
                  ?>
                <tr>
                  <td><?=$i ?></td>
                  <td><?=$document["emailT"]?></td>
                  <td><?=$document["emailBR"]?> </td>
                  <td><?=$document["status"]?> </td>
                  <td><?=$document["Bname"]?> </td>
                   <td><?=$document["Tname"]?> </td>
                   <td><?=$document["value"]?> </td> 
                 
                 
                     
                 
               
                </tr>
                <?php
  }
                ?>
                </tbody>

                                   
                                </table>
                                <?php
  
  $total='3';
    if($page > 1){
        echo '<a href="?page=' . $prev . '" class="btn btn-info">Previous</a>';
        if($page * $limit < $total) {
            echo ' <a href="?page=' . $next . '" class="btn btn-info">Next</a>';
        }
    } else {
        if($page * $limit < $total) {
            echo ' <a href="?page=' . $next . '" class="btn btn-info">Next</a>';
        }
    }

 
                                ?>
                            </div>
                           
                        </div>
                    </div>

                </div>

            </div>


              <?php
  include('script.php');
  ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

     $(document).ready(function(){

    $('#sear').on('keyup',function(){
        var sear = $('#sear').val();
        if(sear){
            $.ajax({
                type:'POST',
                url:'ajaxguru.php',
                data:'sear='+sear,
                
                success:function(html){
                     $('#getcl').html(html);
                  console.log(html)
                }
            }); 
        }
    });
    });

       
</script>