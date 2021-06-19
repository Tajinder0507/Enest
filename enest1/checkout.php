<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST");

header("Access-Control-Allow-Headers: X-Requested-With");

$connect=mysqli_connect("localhost","root","","enest1")or die("connection failed");

if(isset($_POST['uidd']))
{
$uid=$_POST['uidd'];

$query="select c.id,p.product_name,lg.fullname,c.qty from cart c, signup lg, product p  where c.userid=$uid and c.userid=lg.id and c.productid=p.id";
$trp = mysqli_query($connect,$query);
$rows = array();
$msg="hello";
while($r = mysqli_fetch_assoc($trp)) {
    $rows[] = $r;
 }

$response = array(
    "msg" => $msg,
    "mydatas" => $rows
);
$json = json_encode($response);
echo $json;
}
else
   {
    echo "No Results Found.";
   }
?>