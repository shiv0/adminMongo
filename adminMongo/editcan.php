<?php
include('header.php');

$id=$_GET['id'];
if(isset($_POST['submit'])) { 
   $filename= $_FILES['cv']['name'];

    // destination of the file on the server
    $destination = 'recu/uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['cv']['tmp_name'];
    $size = $_FILES['cv']['size'];
   $cvmove=move_uploaded_file($file, $destination);


$dimgs = $_FILES['img']['name'];
if($dimgs=='')
{
  $imgname=$_POST['dimg'];
}else{
  $imgname=$_FILES['img']['name'];
}
   
    $destination1 = 'recu/uploads/' . $imgname;

  $extension1 = pathinfo($imgname, PATHINFO_EXTENSION); 
    $imgfile = $_FILES['img']['tmp_name'];

     $imgmove=move_uploaded_file($imgfile, $destination1);

    if (!in_array($extension1, ['png', 'jpg'])) {
     
        echo '<script>alert("You image extension must be .png, .jpg ");</script>';
    }

 elseif ($_FILES['img']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo '<script>alert("File too large!");</script>';
    }
    else{
        // move the uploaded (temporary) file to the specified destination
     
  $cname = $_POST['cname'];
  $cc=$_POST['cnumber'];
  $cnumber = implode(",",$cc);
  $ee=$_POST['cemail'];
  $cemail = implode(",",$ee);
   $cpaddress = $_POST['cpaddress'];
  $ccity = $_POST['ccity'];
  $caddress = $_POST['caddress'];
   $cpincode = $_POST['cpincode'];
  $cqualification = $_POST['cqualification'];
  $ctexp = $_POST['ctexp'];
   $ctc = $_POST['ctc'];
  $ectc = $_POST['ectc'];
  $notice = $_POST['notice'];
   $pemp = $_POST['pemp'];
  $cd = $_POST['cd'];
  $pe=$_POST['port'];
  $pp = implode(",",$pe);
 
  $cdate = $_POST['cdate'];
   $remarks = $_POST['remarks'];
   $clientname = $_POST['clientname'];
   $pposition = $_POST['pposition'];
   $ps = $_POST['ps'];
   $joblocation = $_POST['joblocation'];
   $idate = $_POST['idate'];
   $ofa = $_POST['ofa'];
   $escore = $_POST['escore'];
   $eeform = $_POST['eeform'];


      

          




 

if($filename=='')
{
 $sql="UPDATE info SET name='$cname',c_no='$cnumber',eid='$cemail',parea='$cpaddress',city='$ccity',address='$caddress',pincode='$cpincode',qualification='$cqualification',total='$ctexp',cctc='$ctc',ectc='$ectc',np='$notice',pemp='$pemp',cdeisgn='$cd',image='$imgname',plink='$pp',datec='$cdate',rremark='$remarks',clientname='$clientname',pposition='$pposition',ps='$ps',joblocation='$joblocation',idate='$idate',ofa='$ofa',escore='$escore',eeform='$eeform' WHERE id='$id'";
}else{
  $sql="UPDATE info SET name='$cname',c_no='$cnumber',eid='$cemail',parea='$cpaddress',city='$ccity',address='$caddress',pincode='$cpincode',qualification='$cqualification',total='$ctexp',cctc='$ctc',ectc='$ectc',np='$notice',pemp='$pemp',cdeisgn='$cd',image='$imgname',cv='$filename',plink='$pp',datec='$cdate',rremark='$remarks',clientname='$clientname',pposition='$pposition',ps='$ps',joblocation='$joblocation',idate='$idate',ofa='$ofa',escore='$escore',eeform='$eeform' WHERE id='$id'";
}
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Candidate Detail Update Successfully");</script>';
            }


else{
   echo '<script>alert("Candidate Detail Updation Failed");</script>';
}

}

            }
?>

<?php
$query=mysqli_query($conn,"SELECT * FROM info WHERE id='$id'");
  
          
while($row=mysqli_fetch_array($query,MYSQLI_BOTH))
{

  $dimg=$row['image'];
  $dcv=$row['cv'];
  $img="recu/uploads/".$row['image'];
  $cv="recu/uploads/".$row['cv'];
  $name=$row['name'];
  $c_no=$row['c_no'];
  $cc=explode(",",$c_no);

  $eid=$row['eid'];
  $ee=explode(",",$eid);
  $parea=$row['parea'];
  $city=$row['city'];
  $address=$row['address'];
  $pincode=$row['pincode'];
  $qualification=$row['qualification'];
  $total=$row['total'];
  $cctc=$row['cctc'];
  $ectc=$row['ectc'];
  $np=$row['np'];
  $pemp=$row['pemp'];
  $cdeisgn=$row['cdeisgn'];
  $datec=$row['datec'];
  $rremark=$row['rremark'];
  $plink=$row['plink'];
  $dbclientname=$row['clientname'];
  $dbpposition=$row['pposition'];
  $dbps=$row['ps'];
  $dbjoblocation=$row['joblocation'];
  $dbidate=$row['idate'];
  $dbofa=$row['ofa'];
  $dbescore=$row['escore'];
  $dbeeform=$row['eeform'];

  
  
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
                                            <h4>Candidate Detail</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area" y>
                          <form role="form" action="#" method="POST" enctype="multipart/form-data">
           
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                           
                    <label for="exampleInputEmail1">Candidate Name*</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="cname" placeholder="Enter Candidate Name" required value="<?=$name?>">
                  </div>
                                            <div class="form-group col-md-6 input_fields_number">
                                                   <label for="exampleInputEmail1">Candidate Contact Number*</label>
                                                   <?php
                                                   foreach ($cc as $cn) {
                                            
                                               
                                                   ?>
                    <input  class="form-control" onchange="return isNumber(event)" id="txtPhoneNo" type="text" name="cnumber[]"  placeholder="Enter Candidate Contact Number" required value="<?=$cn?>">
<br>
                    <?php
}
                    ?>
                            <br>
     <button class="btn btn-primary s">Add Contact Number</button>
                                            </div>
                                        </div>

                                           <div class="row">
                                        <div class="form-group col-md-6 input_fields_email">
                                           
                   <label for="exampleInputEmail1">Candidate Email Id*</label>
                      <?php
                                                   foreach ($ee as $en) {
                                            
                                               
                                                   ?>
                    <input type="text" class="form-control" onchange="return email(event)" id='txtEmail' name="cemail[]" placeholder="Enter Candidate Email Id" value="<?=$en?>" >
                    <br>
                    <?php
}
                    ?>
                        <br>
     <button class="btn btn-secondary e">Add Email</button>
                  </div>
                                            <div class="form-group col-md-6">
                                              <label for="exampleInputEmail1">Candidate Area*</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="cpaddress" placeholder="Enter Present Address" required value="<?=$parea?>">
                                            </div>
                                        </div>
     <div class="row">
           
                                        <div class="form-group col-md-6">
                                           
                     <label for="exampleInputEmail1">Candidate City*</label>
                       <?php
                   $ccity=mysqli_query($conn,"SELECT * FROM city ");

                   ?>
                    <select class="form-control" name="ccity" required>
                      <?php
while($cc=mysqli_fetch_array($ccity,MYSQLI_BOTH))
{
                      ?>
                      <option value="<?=$cc['city_name']?>" <?php if($city==$cc['city_name']) {echo 'selected';}?>><?=$cc['city_name']?></option>
                      <?php
}
                      ?>
                    </select>
                    
                  </div>
                                            <div class="form-group col-md-6">
                                                 <label for="exampleInputEmail1">Candidate Qualification</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="cqualification" placeholder="Enter Candidate Qualification" required value="<?=$qualification?>">
                  
                                            </div>
                                        </div>
                                             <div class="row">
                                        <div class="form-group col-md-6">
                                           
               <label for="exampleInputEmail1">Candidate Total Experience*</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="ctexp" placeholder="Enter Total Experience" required value="<?=$total?>">
                  </div>
                                            <div class="form-group col-md-6">
                                                  <label for="exampleInputEmail1">Candidate Current CTC*</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="ctc" placeholder="Enter Current CTC" required value="<?=$cctc?>">
                                            </div>
                                        </div>

 <div class="row">
                                        <div class="form-group col-md-6">
                                           
            <label for="exampleInputEmail1">Candidate Present Address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="caddress" placeholder="Enter Candidate Address" required value="<?=$address?>">
                  </div>
                                            <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Candidate Pincode</label>
                    <input type="number" class="form-control" onchange="return pincode(event)" id="txtPincode" name="cpincode" placeholder="Enter Candidate Pincode" required value="<?=$pincode?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="form-group col-md-6">
                                           
               <label for="exampleInputEmail1">Candidate Expected CTC</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="ectc" placeholder="Enter Expected CTC" required="" value="<?=$ectc?>">
                  </div>
                                            <div class="form-group col-md-6">
                                                    <label for="exampleInputEmail1">Candidate Notice Period*</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="notice" placeholder="Enter Notice Period" required value="<?=$np?>">  
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Candidate Previous Employer</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="pemp" placeholder="Enter Candidate Previous Employer" required value="<?=$pemp?>"> 
                  </div>
                                            <div class="form-group col-md-6">
                                                 <label for="exampleInputEmail1">Candidate Current Designation*</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="cd" placeholder="Enter Current Designation" required value="<?=$cdeisgn?>"> 
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                           
               <label for="exampleInputEmail1">Upload Photo</label>
                <img src="<?=$img?>" style="width:100px;height:70px;">
                    <input type="file" class="form-control" id="exampleInputEmail1" name="img" placeholder="Enter Total Experience" >
                            <input type="hidden" name="dimg" value="<?=$dimg?>">
                  </div>
                                            <div class="form-group col-md-6">
                     <label for="exampleInputEmail1">Upload CV*</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="cv" placeholder="Enter Total Experience" >
                    <input type="hidden" name="dcv" value="<?=$dcv?>">
                                            </div>

                                        </div>

                                             <div class="row">
                                        <div class="form-group col-md-12 input_fields_wrap">
                                               <label for="exampleInputFile">Portfolio Link (May Have multiple links,So use Add More Field Button)</label>
            
             <input type="text" name="port[]" class="form-control" id="exampleInputEmail1" placeholder="Enter Portfolio Link" value="<?=$plink?>">
                 <br>
     <button class="btn btn-info">Add More Fields</button>
                  </div>
                  <?php
date_default_timezone_set("Asia/Kolkata");
$today = date("d-m-Y");
?>
                                         
                                        </div>
      <div class="row">
    
                                                   <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Client Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="clientname" value="<?=$dbclientname?>"> 
            
                                            </div>
                                        <div class="form-group col-md-6">
         <label for="exampleInputEmail1">Position:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="pposition" placeholder="Enter Position" required value="<?=$dbpposition?>"> 
          
                  </div>
                                        
                                        </div>


 <div class="row">
                                                   <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Profile Status</label>
                  <select class="form-control" name="ps">
                    <option value="RNR">RNR</option>
                    <option value="Call Back">Call Back</option>
                    <option value="Switched Off">Switched Off</option>
                    <option value="Will Call Back">Will Call Back</option>
                    <option value="Not Interested">Not Interested</option>
                    <option value="Will Send CV">Will Send CV</option>
                    <option value="CV Shared">CV Shared</option>
                  </select>
            
                                            </div>
                                <div class="form-group col-md-6">
         <label for="exampleInputEmail1">Job Location:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="joblocation" placeholder="Enter Job Location" required value="<?=$dbjoblocation?>"> 
          
                  </div>
                                    
          
                 
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
         <label for="exampleInputEmail1">Interview Date:</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" name="idate" placeholder="Enter Interview Date" required value="<?=$dbidate?>"> 
          
                  </div>
                                    
                                        <div class="form-group col-md-6">
         <label for="exampleInputEmail1">Offer Accepted:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="ofa" placeholder="Enter Offer Accepted" required value="<?=$dbofa?>"> 
          
                  </div>
                                        
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-6">
         <label for="exampleInputEmail1">Evaluation Scores:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="escore" placeholder="Evaluation Scores" required value="<?=$dbescore?>"> 
          
                  </div>
                                    
                                        <div class="form-group col-md-6">
         <label for="exampleInputEmail1">Evaluation Form Attrition Date:</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" name="eeform" placeholder="Evaluation Form Attrition Date" required value="<?=$dbeeform?>"> 
          
                  </div>
                                        
                                        </div>


                                             <div class="row">
                                                   <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Date Of Joining</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="cdate"  readonly="" value="<?=$today?>"> 
            
                                            </div>
                                        <div class="form-group col-md-6">
         <label for="exampleInputEmail1">Recruiters Remarks:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="remarks" placeholder="Enter Recruiters Remarks" required value="<?=$rremark?>"> 
          
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

</body>
</html>