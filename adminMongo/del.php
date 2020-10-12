<?php

require 'vendor/autoload.php';
include('confiq.php');

$db = $client->test;
  $collection = $db->users_app;
// $result = $collection->drop();
$cursor=$collection->find();
// var_dump($result);

//    $collection = $db->createCollection("qualification");
//     $rr=$db->listCollections();
//     foreach ($rr as $collectionInfo) {
//    var_dump($collectionInfo);

// }
   print_r(count(iterator_to_array($cursor)));
// // $result = $db->dropCollection('test.state');

// // var_dump($result);
// $i=db->getCollection('students').aggregate([{
   
// }]);
// print_r($i);

// $id='5f57565008090000d4001564';
//   $dd=new MongoDB\BSON\ObjectID($id);
//   print_r($dd);

//   $pipeline = array(
//                             array(
//                                 '$lookup' => array(
//                                 'from' => 'city',
//                                 'localField' => 'cname',
//                                 'foreignField' => 'state',
//                                 'as' => 'cityDetail'
//                                       )
//                                   ),

//                                 array(
//                                 '$lookup' => array(
//                                 'from' => 'state',
//                                 'localField' => 'sname',
//                                 'foreignField' => '_id',
//                                 'as' => 'stateDetail'
//                                       )
//                                   ),
//                          );
//  try
//                  {                    

//                     $cursor = $db->city->aggregate($pipeline);

//                  }

//                  catch(Exception $e){

//                  }

//     print_r($cursor->toArray());
// ?>