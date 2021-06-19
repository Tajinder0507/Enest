<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST");

header("Access-Control-Allow-Headers: X-Requested-With");

$connect=mysqli_connect("localhost","root","","enest1")or die("connection failed");

$trp = mysqli_query($connect, "SELECT * from categories");
$rows = array();
while($r = mysqli_fetch_assoc($trp)) {
    $rows[] = $r;
 }
print json_encode($rows);
?>