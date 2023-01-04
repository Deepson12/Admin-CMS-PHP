<?php 
require_once('connection.php');
if(isset($_POST['category_submit']))
{
    
$Particular = $_POST['Particular'];
$Status = $_POST['Status'];
$f_name = $_FILES['img']['name'];
$f_tmp = $_FILES['img']['tmp_name'];
$messagearea = $_POST['message-area'];


$randomnumber = rand(100, 999999);
$img_name = date("Ymdhis") . "_" . $randomnumber . '.jpg';



date_default_timezone_set("Asia/Kathmandu");
$datetime = date('Y-m-d h:i:s A');
// $f_type = $_FILES['img']['type'];
// $f_ext = explode('.', $f_name);
// $f_ext = strtolower(end($f_ext));
// $extensions = array("jpeg", "jpg", "png", "gif");


$sql = "INSERT INTO category (STATUS, NAME, IMAGE, REMARKS, DATETIME) values('.$Status.','.$Particular','$img_name','$messagearea','$datetime')";

if(mysqli_query($con,$sql)){
    move_uploaded_file($f_tmp, "../image-file/" . $img_name);
}else{
    echo "table not created";
}
}
else if(isset($_POST['category_submit2']))
{
 $Particular = $_POST['Particular'];
$Status = $_POST['Status'];

$messagearea = $_POST['message-area'];


$ID = $_POST['category_submit2'];






$sql = "UPDATE category SET STATUS='$Status', NAME='$Particular',  REMARKS='$messagearea' WHERE ID='$ID'";
if(mysqli_query($con,$sql)){
    echo "table created";
}else{
    echo "table not created";
}
}
?>