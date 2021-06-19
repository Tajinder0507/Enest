<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST");

header("Access-Control-Allow-Headers: X-Requested-With");

$connect=mysqli_connect("localhost","root","","enest1")or die("connection failed");

if(isset($_POST['pid']))
{
    if(isset($_POST['qty']) && isset($_POST['pid']) && isset($_POST['uid'])){
        
        $query="insert into cart(userid, productid,qty)values('".$_POST['uid']."', '".$_POST['pid']."', '".$_POST['qty']."')";
        if(mysqli_query($connect,$query))
        {
           
           $data = array("data" => "You Data added successfully");
           echo json_encode($data);
        }
        else
        {
           echo "Error: " . $query . "<br>" . $connect->error;
        }
    }
    else{
        $data = array("data" => "Required fields are missing");
           echo json_encode($data);
    }
}
?>