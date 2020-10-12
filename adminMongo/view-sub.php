 <?php
  $active ='viewsub';
include('header.php');

require 'vendor/autoload.php';
include('confiq.php');
  $db = $client->test;
// $c=$client->users_app;
// $rr=$c->listCollection();
 $collection = $db->subjects;

   
   $cursor = $collection->find();
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
                                        
           
                  <th>Subject Name</th>
                  <th>Action</th>
             
            
                   
                  
                                    </thead>
                                  <tbody id="getcl">
                  <?php
                $i=0;
 foreach ($cursor as $document) {
  $i++;
                  ?>
                <tr>
                  <td><?=$i ?></td>
                  <td><?=$document["name"]?></td>
                 
                     
                 
                <td>
                               
 <a href="delrec.php?sub=<?=$document["_id"]?>" class="btn btn-danger">
           Delete
            </a>
<br>
             <a href="edit-sub.php?id=<?=$document['_id']?>" class="btn btn-info">
        Edit
            </a>


                </td>
                </tr>
                <?php
  }
                ?>
                </tbody>

                                   
                                </table>
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
        var cl = $(this).val();
        if(cl){
            $.ajax({
                type:'POST',
                url:'ajaxguru.php',
                data:'sear='+sear,
                
                success:function(html){
                     $('#getcl').html(html);
                 
                }
            }); 
        }
    });
    });
</script>