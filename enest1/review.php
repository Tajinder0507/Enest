<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST");

header("Access-Control-Allow-Headers: X-Requested-With");

   $connect=mysqli_connect("localhost","root","","enest1")or die("connectin failed");
   if(isset($_POST['name']))
{
    if($_POST['name'] && $_POST['email'] && $_POST['review'] && $_POST['rating']){
        $query="insert into review(name,email,reviews,rating)values('".$_POST['name']."', '".$_POST['email']."', '".$_POST['review']."', '".$_POST['rating']."')" ;
        if(mysqli_query($connect,$query))
        {
           
           $data = array("data" => "You Review added successfully");
           echo json_encode($data);
           //return response()->json(["data" => "You Data added successfully"]);
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

else{
    $trp = mysqli_query($connect, "SELECT * from pages");
    $rows = array();
    while($r = mysqli_fetch_assoc($trp)) {
        $rows[] = $r;
    }
    print json_encode($rows);
 }
		
		
?> 
