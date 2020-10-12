 <?php
  $active ='viewrecu';
include('header.php');

require 'vendor/autoload.php';
include('confiq.php');
  $db = $client->test;
$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $limit = 5;
    $skip  = ($page - 1) * $limit;
    $next  = ($page + 1);
    $prev  = ($page - 1);
 $collection = $db->Cards;
 $sort  = array('createdAt' => -1);
  $cur = $collection->find();
   $cursor = $collection->find([],

    [
      'limit'=>$limit,
      'skip'=>$skip,
      'sort'=>$sort
    ]);
  $getState = $db->state;
  $fetchState = $getState->find();

   $getSub = $db->subjects;
   $fetchSub = $getSub->find(); 
?>
  <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" >
                        <div class="widget-content widget-content-area br-6 " style="width:1000px;">
                            <div class="table-responsive mb-4 mt-4">
                                   <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                          <input type="text" id="sear" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                        &nbsp&nbsp&nbsp
                         <div class="form-group">
                        <select class="form-control" id="state">
                          <option >State</option>
                      <?php
                      foreach ($fetchState as $fdata) {
                   
                 
                      ?>
                      <option value="<?=$fdata['sname']?>"><?=$fdata['sname']?></option>
                      <?php
}
                      ?>
                    </select>
              
                        </div>
    &nbsp&nbsp&nbsp

                             <div class="form-group">
                  <select class="form-control" id="sub">
                      <option >Subject</option>
                      <?php
                      foreach ($fetchSub as $fsub) {
                   
                 
                      ?>
                      <option value="<?=$fsub['name']?>"><?=$fsub['name']?></option>
                      <?php
}
                      ?>
                    </select>
                        </div>
 &nbsp&nbsp&nbsp
                               <div class="form-group">
                        <select class="form-control" id="amt">
                                    <option >Amount</option>
                          <option>10-1000</option>
                          <option>1000-2000</option>
                          <option>2000-3000</option>

                        </select>
                        </div>
                    </form>
                    <br>
                                <table id="zero-config" class="table table-hover" >
                                    <thead>
                                         <th>Sr.no</th>
                                         <th>Email</th>
                  <th> Name</th>
                  
                  <th>Subject</th>
                  <th>Duration</th>
                  <th>Amount</th>
                  <th>Description</th>
                  <th>State</th>
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
                  <td><?=$document["email"]?></td>
                  <td><?=$document["name"]?> </td>
                  <td><?=$document["subject"]?> </td>
                  <td><?=$document["duration"]?> </td>
                   <td><?=$document["amount"]?> </td>
                   <td><?=$document["description"]?> </td> 
                  <td><?=$document["state"]?> </td> 
                 
                     
                 
                <td>
                               
 <a href="delrec.php?id=<?=$document["name"]?>" class="btn btn-danger">
           Delete
            </a>
<br>
             <a href="card-edit.php?id=<?=$document['email']?>" class="btn btn-info">
        Edit
            </a>


                </td>
                </tr>
                <?php
  }
                ?>
                </tbody>

                                   
                                </table>
                                <?php
  
  $total= count(iterator_to_array($cur));
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

        $(document).ready(function(){

    $('#state').on('change',function(){
        var state = $('#state').val();
        if(state){
            $.ajax({
                type:'POST',
                url:'ajaxguru.php',
                data:'state='+state,
                
                success:function(html){
                     $('#getcl').html(html);
                  console.log(html)
                }
            }); 
        }
    });
    });


                $(document).ready(function(){

    $('#sub').on('change',function(){
        var sub = $('#sub').val();
        if(sub){
            $.ajax({
                type:'POST',
                url:'ajaxguru.php',
                data:'sub='+sub,
                
                success:function(html){
                     $('#getcl').html(html);
                  console.log(html)
                }
            }); 
        }
    });
    });


                                $(document).ready(function(){

    $('#amt').on('change',function(){
        var amt = $('#amt').val();
        if(amt){
            $.ajax({
                type:'POST',
                url:'ajaxguru.php',
                data:'amt='+amt,
                
                success:function(html){
                     $('#getcl').html(html);
                  console.log(html)
                }
            }); 
        }
    });
    });
</script>