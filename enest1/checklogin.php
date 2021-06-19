<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST");

header("Access-Control-Allow-Headers: X-Requested-With");

$connect=mysqli_connect("localhost","root","","enest1")or die("connection failed");

if(isset($_POST['userpass']))
{
    $trp = mysqli_query($connect, "SELECT * from signup where password ='".$_POST['userpass']."'");
    if($trp){
        $rows = array();
        $msg="login successfully";
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
    else{
        echo "No Results Found.";
    }

}