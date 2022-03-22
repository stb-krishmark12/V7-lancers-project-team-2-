<?php

session_start();
if(isset($_POST)){
    $host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ecart";





// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
    $error=0;
    $error_pass_signin='';
    $error_email_signin='';
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $query="SELECT * FROM register1 Where email='".$email."'";
    $statement = mysqli_query($conn, $query);
	if($statement)
        {
            $total_row = mysqli_num_rows($statement);
            if($total_row > 0)
            {
                while($row = mysqli_fetch_assoc($statement))
                {
                    if($pass==$row["pass"])
                    {
                        $_SESSION["id"] = $row["id"];
                    
                    }
                    else
                    {
                        $error_pass_signin = "Wrong Password";
                        $error++;
                    }
                }
            }
            else
            {
            
                $error_email_signin = "Wrong email Address";
                $error++;
            }
        }
        if($error>0){
            $output = array(
                'error'			=>	true,
                'error_email_signin'	=>	$error_email_signin,
                'error_pass_signin'	=>	$error_pass_signin,
            );
        }
        else
        {
            $output = array(
                'success'		=>	true,
            );
        }
    echo json_encode($output);
    

}

?>