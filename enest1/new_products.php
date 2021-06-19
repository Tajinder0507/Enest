<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST");

header("Access-Control-Allow-Headers: X-Requested-With");

$connect=mysqli_connect("localhost","root","","enest1")or die("connection failed");


$trp = mysqli_query($connect, "SELECT * from product order by id desc");
$rows = array();
$msg="hello";
while($r = mysqli_fetch_assoc($trp)) {
    $rows[] = $r;
 }

$trp1 = mysqli_query($connect, "SELECT * from product where special=1");
$rows1 = array();
while($r1 = mysqli_fetch_assoc($trp1)) {
    $rows1[] = $r1;
 }

 $trp2 = mysqli_query($connect, "SELECT * from product order by rand()");
$rows2 = array();
while($r2 = mysqli_fetch_assoc($trp2)) {
    $rows2[] = $r2;
 }

$response = array(
    "msg" => $msg,
    "myData" => $rows,
    "special" => $rows1,
    "allProduct" => $rows2
);
$json = json_encode($response);
echo $json;
?>