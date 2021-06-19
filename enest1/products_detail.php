<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST");

header("Access-Control-Allow-Headers: X-Requested-With");

$connect=mysqli_connect("localhost","root","","enest1")or die("connection failed");

if(isset($_POST['cid']))
{
$trp = mysqli_query($connect, "SELECT * from product where categoryid =".$_POST['cid']);
$rows = array();
$msg="hello";
while($r = mysqli_fetch_assoc($trp)) {
    $rows[] = $r;
 }

$trp1 = mysqli_query($connect, "SELECT * from categories where id =".$_POST['cid']);
$rows1 = array();
while($r1 = mysqli_fetch_assoc($trp1)) {
    $rows1[] = $r1;
 }
 
$response = array(
    "msg" => $msg,
    "myData" => $rows,
    "title" => $rows1,
);
$json = json_encode($response);
echo $json;
}
else
   {
    echo "No Results Found.";
   }
?>