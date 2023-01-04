<?php 

require_once('connection.php');

$Particular = $_POST['Particular'];
$Status = $_POST['Status'];
$Category = $_POST['Category'];
$Price = $_POST['Price'];
$Discount = $_POST['Discount'];
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


$sql = "INSERT INTO product (STATUS, NAME, CID, REMARKS, DATETIME, PRICE, DISCOUNT) values('.$Status.','.$Particular','$Category','$messagearea','$datetime','$Price','$Discount')";

if(mysqli_query($con,$sql)){
    echo "table created";
    move_uploaded_file($f_tmp, "../image-file/" . $img_name);
}else{
    echo "table not created";
}
?>
