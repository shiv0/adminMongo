<?php
include('header.php');

$id=$_GET['id'];
if(isset($_POST['submit'])) { 
  $rname = $_POST['rname'];
  $remail = $_POST['remail'];
  $rpass = $_POST['rpass'];
      
      date_default_timezone_set("Asia/Kolkata");
$today = date("d-m-Y");
    
$sql=mysqli_query($conn,"UPDATE login SET name='$rname',email='$remail',password='$rpass' WHERE id='$id'");


            if ($sql) {
              $sqldel=mysqli_query($conn,"DELETE FROM temp_data WHERE rid='$id'");

                echo '<script>alert("Recruiter Detail Verify");
                window.location="rv.php";

                </script>';
            }

else{
   echo '<script>alert("Recruiter Registeration Failed");</script>';
}


            }



            if(isset($_POST['cancel'])) { 
  
              $sqldel=mysqli_query($conn,"DELETE FROM temp_data WHERE rid='$id'");
if($sqldel){
                echo '<script>alert("Recruiter Detail Has Been Rejected");
                  window.location="rv.php";

                </script>';
            }

else{
   echo '<script>alert("Recruiter Registeration Failed");</script>';
}


            }
?>

<?php
$querys=mysqli_query($conn,"SELECT * FROM temp_data WHERE rid='$id'");
  
          
while($rows=mysqli_fetch_array($querys,MYSQLI_BOTH))
{

  $name=$rows['t_name'];
  $email=$rows['t_email'];
  $pass=$rows['t_password'];

 

  
  
}
                  ?>

 <div id="content" class="main-content">
            <div class="container">
                <div class="container">
 <div class="row" style="width:900px;">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Recruiter Verification Detail</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area" y>
                          <form role="form" action="#" method="POST" enctype="multipart/form-data">
           
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                           
                    <label for="exampleInputEmail1">Recruiter Name*</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="rname" placeholder="Enter Recruiter Name" required value="<?=$name?>">
                  </div>
                                            <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Recruiter Email*</label>
                    <input  class="form-control" onchange="return email(event)"  type="email" name="remail"  placeholder="Enter Recruiter Email" required value="<?=$email?>">
                            </div>
                                        </div>

                                           <div class="row">
                          
                                            <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Recruiter Password*</label>
                    <input  class="form-control"  id="txtPhoneNo" type="text" name="rpass"  placeholder="Enter Password" required value="<?=$pass?>">
                            </div>
                                        </div>

                                       
                                   
                                        <button type="submit" class="btn btn-primary" name="submit" onclick="ValidateNo();">Verify</button>

                                        <button type="submit" class="btn btn-danger" name="cancel" >Reject</button>
                </div>
          </form>

                                </div>
                            </div>
                        </div>


   <?php
   include('script.php');
   ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script type="text/javascript">


          function isNumber() {

              var phoneNo = document.getElementById('txtPhoneNo');
 if (phoneNo.value == "" || phoneNo.value == null) {
    alert("Please enter your Mobile No.");
    return false;
  }
  if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
    alert("Mobile No. is not valid, Please Enter 10 Digit Mobile No.");
    return false;
  }

  return true;
}





          function pincode() {
   var pin = document.getElementById('txtPincode');
 
if (pin.value == "" || pin.value == null) {
    alert("Please enter your Pincode.");
    return false;
  }
  if (pin.value.length < 6 || pin.value.length > 6) {
    alert("Pincode. is not valid, Please Enter 6 Digit Pincode.");
    return false;
  }


  return true;
}


  function email() {
 var email = document.getElementById('txtEmail');

 var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  
 if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
}
  


  return true;
}




                 $(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper       = $(".input_fields_wrap"); //Fields wrapper
  var add_button      = $(".btn-info"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<br><div><input type="text" placeholder="Enter Portfolio Link" class="form-control" id="exampleInputEmail1" name="port[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
    }
  });
  
  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })



    var max_fieldss      = 10; //maximum input boxes allowed
  var wrapperss      = $(".input_fields_number"); //Fields wrapper
  var add_buttons      = $(".s"); //Add button ID
  
  var xx = 1; //initlal text box count
  $(add_buttons).click(function(e){ //on add input button click
    e.preventDefault();
    if(xx < max_fieldss){ //max input box allowed
      x++; //text box increment
      $(wrapperss).append('<br><div><input  class="form-control" onchange="return isNumber(event)" id="txtPhoneNo" type="number" name="cnumber[]"  placeholder="Enter Candidate Contact Number" required><a href="#" class="remove_field">Remove</a></div>'); //add input box
    }
  });
  
  $(wrapperss).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); xx--;
  })



                 var max_fieldse      = 10; //maximum input boxes allowed
  var wrapperse      = $(".input_fields_email"); //Fields wrapper
  var add_buttone      = $(".e"); //Add button ID
  
  var xe = 1; //initlal text box count
  $(add_buttone).click(function(e){ //on add input button click
    e.preventDefault();
    if(xe < max_fieldse){ //max input box allowed
      x++; //text box increment
      $(wrapperse).append('<br><div>   <input type="text" class="form-control" onchange="return email(event)" id="txtEmail" name="cemail[]" placeholder="Enter Candidate Email Id" ><a href="#" class="remove_field">Remove</a></div>'); //add input box
    }
  });
  
  $(wrapperse).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); xe--;
  })
});
    </script>

</body>
</html>