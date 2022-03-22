<?php

session_start();

if(isset($_POST)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ecart";
    
    
    
    
    
    // Create connection
    $connect = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if($_POST["action"]=="addtocart"){
        $productid=$_POST["productid"];

        $query = "INSERT INTO cart VALUES(".$_SESSION["id"].",".$productid.")";
        $statement=mysqli_query($connect,$query);
        // $total_row = mysqli_num_rows($statement);
        if($statement){
            $output=array(
                "success" => true
            );
        }
    }
}

?>