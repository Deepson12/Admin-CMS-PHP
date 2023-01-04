<?php 
require_once('connection.php');

if(isset($_POST["upload11"])) {
    $Username = $_POST['tx_username'];
    $password = $_POST['tx_password'];

    if($Username == "" || $password == "") {
        echo "empty";
    }else{
        $sql = "SELECT * FROM clientindex where Username='$Username' and Password='$password'";

       $data =  mysqli_query($con,$sql);
       if(mysqli_num_rows($data)== 1){
        echo "login success";
        session_start();

        $row = mysqli_fetch_array($data);

        $_SESSION['clientsite'] = $row['id'];
       }else{
           echo "wrong username";
       }
    }
}


else{
    echo "failed";
}



?>