<?php
require 'vendor/autoload.php';
include('confiq.php');

  $db = $client->test;
// $c=$client->users_app;
// $rr=$c->listCollection();
 $collection = $db->login;

   // echo "Collection selected succsessfully";
   // $cursor = $collection->find();
   // // iterate cursor to display title of documents
	
   // foreach ($cursor as $document) {

   //    echo $document["email"] . "\n";
   //    echo $document["name"] . "\n";
   //     echo $document["subject"] . "\n";
   //      echo $document["duration"] . "\n";
   //       echo $document["date"] . "\n";
   //        echo $document["amount"] . "\n";
   //         echo $document["description"] . "\n";
   //        echo $document["state"] . "\n";      

  
   // }
 
   // $collection = $db->createCollection("login");
    // $data = $db->find();
    // echo "<pre>";print_r($data);

       $document = array( 
      "email" =>"admin@gmail.com", 
      "password" =>"admin123", 
     


   );
  
   $collection->insertOne($document);

   if($collection->insertOne($document))
   {
    echo '<script>alert("Card Successfully");</script>';
  }
?>