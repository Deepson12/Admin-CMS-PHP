<?php 
require_once('connection.php');

if(isset($_POST["worked"])) {
    $Particular = $_POST['Particular'];
    $Status = $_POST['Status'];

    if($Particular == "" || $Status == "") {
        echo "empty";
    }else{
        $sql = "SELECT * FROM mycategory where Particular='$Particular' and Status='$Status'";

       $data =  mysqli_query($con,$sql);
       if(mysqli_num_rows($data)== 1){
        echo "login success";
        session_start();

        $_SESSION['my__website'] = $Particular;
       }else{
           echo "wrong username";
       }
    }
}else{
    echo "failed";
}



?>