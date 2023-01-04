<?php 

session_start();

if(isset($_SESSION["clientsite"])) {

}else{
    header("location:clientsiteindex.php");
}

?>

<?php 
require_once('connection.php');

if(isset($_POST['ID'])&&isset($_POST['quantity'])){

$ID = $_POST['ID'];
$cusID = $_SESSION['clientsite'];
$quantity = $_POST['quantity'];
$Status = "1";

date_default_timezone_set("Asia/Kathmandu");
$datetime = date('Y-m-d h:i:s A');

$sql = "INSERT INTO orderlist (PID, STATUS, DATETIME, cusID, quantity) values('.$ID.','.$Status','$datetime','$cusID','$quantity')";

if(mysqli_query($con,$sql)){
    echo "table created";
}else{
    echo "table not created";
}


}else{
    echo "wooooow";
}

?>