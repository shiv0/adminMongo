<?php



require 'vendor/autoload.php';
include('confiq.php');

  $db = $client->test;
if(isset($_GET['id']))
{
	$id=$_GET['id'];
 $collection = $db->Cards;



$deleteResult = $collection->deleteOne(['name'=>$id]);

	if($deleteResult)
	{
		header('location:view-e.php');
	}

}

if(isset($_GET['uid']))
{
	$uid=$_GET['uid'];
 $collection = $db->users_app;



$deleteResult = $collection->deleteOne(['email'=>$uid]);

	if($deleteResult)
	{
		header('location:view-user.php');
	}

}


if(isset($_GET['bid']))
{
	$bid=$_GET['bid'];
 $collection = $db->BHCards;



$deleteResult = $collection->deleteOne(['email'=>$bid]);

	if($deleteResult)
	{
	header('location:view-branch.php');
	}

}



if(isset($_GET['state']))
{
	$state=$_GET['state'];
 $collection = $db->state;



$deleteResult = $collection->deleteOne(['_id'=>new MongoDB\BSON\ObjectID($state)]);

	if($deleteResult)
	{
	header('location:view-state.php');
	}

}


if(isset($_GET['city']))
{
	$city=$_GET['city'];
 $collection = $db->city;



$deleteResult = $collection->deleteOne(['_id'=>new MongoDB\BSON\ObjectID($city)]);

	if($deleteResult)
	{
	header('location:view-mcity.php');
	}

}


if(isset($_GET['qua']))
{
	$qua=$_GET['qua'];
 $collection = $db->qualification;



$deleteResult = $collection->deleteOne(['_id'=>new MongoDB\BSON\ObjectID($qua)]);

	if($deleteResult)
	{
	header('location:view-qualification.php');
	}

}


if(isset($_GET['sub']))
{
	$sub=$_GET['sub'];
 $collection = $db->subjects;



$deleteResult = $collection->deleteOne(['_id'=>new MongoDB\BSON\ObjectID($sub)]);

	if($deleteResult)
	{
	header('location:view-sub.php');
	}

}
?>