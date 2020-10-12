 <?php
  $active ='viewrv';
include('header.php');

    if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        } 
$no_of_records_per_page =5;

$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM client ";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);              
$query=mysqli_query($conn,"SELECT * FROM temp_data  LIMIT $offset, $no_of_records_per_page");

?>
  <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" >
                        <div class="widget-content widget-content-area br-6 " style="width:1000px;">
                            <div class="table-responsive mb-4 mt-4">
                                   <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                       <!--      <input type="text" class="form-control search-form-control   ml-lg-auto" id="cl" placeholder="Search..."> -->
                        </div>
                    </form>
                    <br>
                                <table id="zero-config" class="table table-hover" >
                                    <thead>
                                         <th>Sr.no</th>
                  <th>Recruiter Name</th>
                  <th>Recruiter Email</th>
                  
                  <th>Action</th>
                  
                                    </thead>
                                  <tbody id="getcl">
                  <?php
                $i=0;
while($row=mysqli_fetch_array($query,MYSQLI_BOTH))
{
  $i++;
                  ?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$row['t_name']?></td>
                  <td><?=$row['t_email']?> </td>
                  
                  <td>
                  
             <a href="edit-rv.php?id=<?=$row['rid']?>" class="btn btn-info">
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
                            <ul class="pagination  pull-right">
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        
        <li><a href="?pageno=1" class="btn btn-info">First</a></li>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="btn btn-info">Prev</a>

        </li>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="btn btn-info">Next</a>
        </li>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <li><a href="?pageno=<?php echo $total_pages; ?>" class="btn btn-info">Last</a></li>
    </ul>
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

    $('#cl').on('keyup',function(){
        var cl = $(this).val();
        if(cl){
            $.ajax({
                type:'POST',
                url:'ajaxguru.php',
                data:'cl='+cl,
                success:function(html){
                     $('#getcl').html(html);
                    console.log(html);
                }
            }); 
        }
    });
    });
</script>