<?php 
require_once('connection.php');

if(isset($_POST["upload"])) {
    $Username = $_POST['tx_username'];
    $password = $_POST['tx_password'];

    if($Username == "" || $password == "") {
        echo "empty";
    }else{
        $sql = "SELECT * FROM mywebsite where Username='$Username' and Password='$password'";

       $data =  mysqli_query($con,$sql);
       if(mysqli_num_rows($data)== 1){
        echo "login success";
        session_start();

        $_SESSION['my__website'] = $Username;
       }else{
           echo "wrong username";
       }
    }
}


else{
    echo "failed";
}



?>