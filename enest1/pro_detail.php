<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST");

header("Access-Control-Allow-Headers: X-Requested-With");

$connect=mysqli_connect("localhost","root","","enest1")or die("connection failed");

if(isset($_POST['pid']))
{
$trp = mysqli_query($connect, "SELECT * from product where id =".$_POST['pid']);
$rows = array();
$msg="hello";
while($r = mysqli_fetch_assoc($trp)) {
    $rows[] = $r;
 }

$response = array(
    "msg" => $msg,
    "myData" => $rows
);
$json = json_encode($response);
echo $json;
}
else
   {
    echo "No Results Found.";
   }
?>