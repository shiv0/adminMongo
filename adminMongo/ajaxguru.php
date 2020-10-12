
             

<?php




require 'vendor/autoload.php';
include('confiq.php');

  $db = $client->test;

 $collection = $db->Cards;
$collect = $db->city;






     

           
      


      if(isset($_REQUEST["sear"] ))
{
  
$sear=$_REQUEST["sear"];



  $cursor = $collection->find(array('name' =>new \MongoDB\BSON\Regex($sear)));

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
                  <td><?=$document["description"]?></td> 
                 <td><?=$document["state"]?> </td>     
                  <td>   
                 
                
                              
 <a href="delrec.php?id=<?=$document["name"]?>" class="btn btn-danger">
           Delete
            </a>
<br>
             <a href="edit-r.php?id=<?=$row['id']?>" class="btn btn-info">
        Edit
            </a>


                </td>
                </tr>
                <?php
  }

}






     if(isset($_REQUEST["state"] ))
{
  
$state=$_REQUEST["state"];



  $cursor = $collection->find(array('state' =>new \MongoDB\BSON\Regex($state)));

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
                  <td><?=$document["description"]?></td> 
                 <td><?=$document["state"]?> </td>     
                  <td>   
                 
                
                              
 <a href="delrec.php?id=<?=$document["name"]?>" class="btn btn-danger">
           Delete
            </a>
<br>
             <a href="edit-r.php?id=<?=$row['id']?>" class="btn btn-info">
        Edit
            </a>


                </td>
                </tr>
                <?php
  }

}



  if(isset($_REQUEST["sub"] ))
{
  
$sub=$_REQUEST["sub"];



  $cursor = $collection->find(array('subject' =>new \MongoDB\BSON\Regex($sub)));

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
                  <td><?=$document["description"]?></td> 
                 <td><?=$document["state"]?> </td>     
                  <td>   
                 
                
                              
 <a href="delrec.php?id=<?=$document["name"]?>" class="btn btn-danger">
           Delete
            </a>
<br>
             <a href="edit-r.php?id=<?=$row['id']?>" class="btn btn-info">
        Edit
            </a>


                </td>
                </tr>
                <?php
  }

}



  if(isset($_REQUEST["amt"] ))
{
  
$amt=$_REQUEST["amt"];



  $cursor = $collection->find(array('amount' => array('$gt' => '100', '$lte' =>'1000')));

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
                  <td><?=$document["description"]?></td> 
                 <td><?=$document["state"]?> </td>     
                  <td>   
                 
                
                              
 <a href="delrec.php?id=<?=$document["name"]?>" class="btn btn-danger">
           Delete
            </a>
<br>
             <a href="edit-r.php?id=<?=$row['id']?>" class="btn btn-info">
        Edit
            </a>


                </td>
                </tr>
                <?php
  }

}
           




             if(isset($_REQUEST["ustate"] ))
{
  
$ustate=$_REQUEST["ustate"];



  $cursors = $collect->find(array('state'  =>new \MongoDB\BSON\Regex($ustate)));

           
 foreach ($cursors as $document) {

                  ?>
               <option value="<?=$document['cname']?>"><?=$document['cname']?></option>
                <?php
  }

}
           
      

?>                            
                             

           
      
