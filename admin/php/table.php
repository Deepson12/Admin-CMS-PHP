<?php
require_once('connection.php');
?>

<?php
$WithFilter=""; 
if (isset($_POST['getdata2']))
{
    $limit = 10;
    $currentPages = $_POST['page'];
    $loadpage = ( $currentPages -1) * $limit;
   echo '

   
<div class="my-btn-show" id="my-btn-show"></div>


<table>
   
<thead>
        <th>ID</th>
        <th>Features</th>
        <th>Status</th>
        <th>Remarks</th>
        <th>Image</th>
        <th>Action</th>
        <th>DateTime</th>
</thead> 
   <tbody>';
   $var = "SELECT  ID, STATUS, NAME, IMAGE, REMARKS, DATETIME from category LIMIT $loadpage,$limit";
   $data = mysqli_query($con, $var);
while($row = mysqli_fetch_array($data))
{

    echo '<tr> 
    <td>'.$row['ID'].'</td>
    <td>'.$row['NAME'].'</td>
    <td>'; 
    if($row['STATUS'] == 1)
    {
echo 'Active';
    }
    else
    {
        echo 'Inactive';
    }
    
    
    echo '</td>
    <td>'.$row['REMARKS'].'</td>
    <td>'.$row['IMAGE'].'</td>
    <td><button id="my-btn-id" class="my-btn-class" dataid="'.$row['ID'].'"><i class="uil uil-edit"></i></button></td>
    <td>'.$row['DATETIME'].'</td>
    </tr>

    ';
}
echo '
   </tbody>
</table>

<script>
$(".pgno").click(function() {
    page =  $(this).attr("dataid");

    FN_LoadData(page);
});

// $(".my-btn-class").click(function() {

//    id =  $(this).attr("dataid");
//    alert(id);
// })


$(".my-btn-class").click(function() {

   jQuery(".my-btn-class").attr("disabled", true);
    id =  $(this).attr("dataid");
//  
    $.ajax({
        url: "php/editform.php",
        type: "post",
        data: { mypost: id },
        success: function(response) {
       
 
   $("#msg5").append(response);
   jQuery(".my-btn-class").attr("disabled", false);
        }
    })
});

</script>
';
include('../function.php');
FN_GetPages($limit, $currentPages, $WithFilter, mysqli_num_rows($data), 'pgno', "SELECT count(ID) as ID FROM category");
}
?>

<style>
 .div-data-view-body
    {
        height: 100vh;
        width: calc(100vw - 220px);
        float: right;
    }
    @media screen and (max-width: 632px) {
    .div-data-view-body{
            width: calc(100vw - 100px);
        }
    }

    .class-body{
        transition: all 400ms;
    }
      #msg2{
        position: fixed;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0,0,0,0.7);
    }
    .class-head{
        width: 75vw;
        background-color: red;
        /* padding: 5px 5px; */
        margin: 5px auto;
        transform: translateY(50%);
        box-shadow: 10px 10px rgba(0,0,0,0.7);
    }
    .inner-head{
        background-color: rgb(30,100,140);
        padding: 5px 5px;

    }
    .class-inner-close{
        float: right;
        margin-top: -34px;
        font-size: 26px;
        height: 35px;
        width: 35px;
        font-weight: 600;
        border: none;
        color: #000;
        cursor: pointer;
        background-color: rgb(30,100,140);
    }
    .class-inner-body{
        padding: 10px 10px;
    }
    .class-inner-section{
        padding: 1em 1em;
        font-weight: 1000;
    }
    .class-title-input{
        width: calc(100% - 120px);
        float: right;
    }

    .message-area{
        height: 5rem;
    }
    
    .response-msgs{
        display: flex;
        float: right;
    }
   
   #msg{
      position: absolute;
      display: flex;
      width: 100vh;
      height: 100vh;

   }
   #msg4{
        position: absolute;
        display: flex;
        width: 100vh;
        height: 100vh;
    }
    #msg5{
        position: absolute;
        display: flex;
    }
    #msg6{
        position: absolute;
        display: flex;
    }
</style>