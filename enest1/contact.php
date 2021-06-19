<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST");

header("Access-Control-Allow-Headers: X-Requested-With");

$connect=mysqli_connect("localhost","root","","enest1")or die("connection failed");

if(isset($_POST['full_name']))
{
    if(isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['message'])){
        
        $query="insert into contactus(full_name, email, message)values('".$_POST['full_name']."', '".$_POST['email']."', '".$_POST['message']."')";
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