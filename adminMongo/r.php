<?php
 $active ='rec';
include('header.php');

require 'vendor/autoload.php';
include('confiq.php');

  $db = $client->test;
// $c=$client->users_app;
// $rr=$c->listCollection();
 $collection = $db->users_app;

if(isset($_POST['submit'])) { 
  $uname = $_POST['uname'];
  $lname = $_POST['lname'];
  $uemail = $_POST['uemail'];
  $upass = $_POST['upass'];
  $umobile = $_POST['umobile'];
  $uqua = $_POST['uqua'];
  $uaddress = $_POST['uaddress']; 
  $dis = $_POST['dis']; 
  $ustate = $_POST['ustate'];
  $upincode = $_POST['upincode']; 
  $ucate = $_POST['ucate']; 
      
    $document = array( 
      "name" => $uname, 
      "lname" => $lname, 
      "email" => $uemail,
      "mobile" => $umobile,
      "password" => $upass,
      "qualification" =>$uqua,
      "address" => $uaddress,
      "district" => $dis,
      "state" => $ustate,
      "pin" => $upincode,
      "category" =>$ucate


   );
  
   $collection->insertOne($document);
   //echo "Document inserted successfully";
echo '<script>alert("User Register Successfully");</script>';
            }
              $getState = $db->state;
  $fetchState = $getState->find(); 

   $getq = $db->qualification;
   $fetchq = $getq->find();

  $getCity = $db->city;
  $fetchCity = $getCity->find();
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
                                            <h4>User Registration</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area" y>
                          <form role="form" action="#" method="POST" enctype="multipart/form-data">
           
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                           
                    <label for="exampleInputEmail1">User Name*</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="uname" placeholder="Enter User Name" required>
                  </div>
                           
                                            <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">User Last Name*</label>
                    <input  class="form-control"   type="text" name="lname"  placeholder="Enter User Last Name" required>
                            </div>
                                        </div>

                                           <div class="row">
                                           <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">User Email*</label>
                    <input  class="form-control" onchange="return email(event)"  type="email" name="uemail"  placeholder="Enter User Email" required>
                            </div>
                                            <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">User Password*</label>
                    <input  class="form-control"  id="txtPhoneNo" type="password" name="upass"  placeholder="Enter User" required>
                            </div>
                                        </div>

                                                <div class="row">
                                           <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">User Mobile*</label>
                    <input  class="form-control"  type="number" name="umobile"  placeholder="Enter User Mobile" required>
                            </div>
                                            <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">User Qualification*</label>
                   <select class="form-control" name="uqua">
                      <?php
                      foreach ($fetchq as $cq) {
                   
                 
                      ?>
                      <option value="<?=$cq['qname']?>"><?=$cq['qname']?></option>
                      <?php
}
                      ?>
                    </select>
                            </div>
                                        </div>


                          <div class="row">
                                           <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">User Address*</label>
                    <input  class="form-control"   type="text" name="uaddress"  placeholder="Enter User Address" required>
                            </div>
                                                 <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">User State*</label>
                        <select class="form-control" name="ustate" id="ustate">
                      <?php
                      foreach ($fetchState as $fdata) {
                   
                 
                      ?>
                      <option value="<?=$fdata['sname']?>"><?=$fdata['sname']?></option>
                      <?php
}
                      ?>
                    </select>
                            </div>
                                          
                                        </div>


                          <div class="row">
                              <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">User District*</label>
                 <select class="form-control" name="dis" id="udis">
                      <?php
                      foreach ($fetchCity as $cdata) {
                   
                 
                      ?>
                      <option value="<?=$cdata['cname']?>"><?=$cdata['cname']?></option>
                      <?php
}
                      ?>
                    </select>
                            </div>
                      
                                            <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">User Pincode*</label>
                    <input  class="form-control"  id="txtPhoneNo" type="number" name="upincode"  placeholder="Enter Pincode" required>
                            </div>
                                        </div>

                                               <div class="row">
                                           <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">User Category*</label>
                    <input  class="form-control"  type="text" name="ucate"  placeholder="Enter User Category" required>
                            </div>
                                
                                        </div>

                                       
                                   
                                        <button type="submit" class="btn btn-primary" name="submit" onclick="ValidateNo();">Submit</button>
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
<script type="text/javascript">
          $(document).ready(function(){

    $('#ustate').on('change',function(){
        var ustate = $('#ustate').val();
        if(ustate){
            $.ajax({
                type:'POST',
                url:'ajaxguru.php',
                data:'ustate='+ustate,
                
                success:function(html){
                     $('#udis').html(html);
                  console.log(html)
                }
            }); 
        }
    });
    });

</script>
</body>
</html>