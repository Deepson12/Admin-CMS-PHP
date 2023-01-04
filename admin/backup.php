<?php include'header.php'; ?>

<script>
</script>
<div class="div-data-view-body">
<div class="div-data-view-ch-body">
<div class="div-data-view-head">
    <h3 class="h3-head">Category Account</h3>
</div>


<?php include'searchbar.php'; ?>

<div class="head-text-box">
    <div class="head-text-area">
        <h3>All Feature Details</h3> 
         <button class="add-btn" id="add-btn">Add New</button>
    </div>
</div>
<?php
require_once('php/connection.php');


$var = "SELECT  ID, STATUS, NAME, IMAGE, REMARKS, DATETIME from category LIMIT 10";
$data = mysqli_query($con, $var);
?>

<table>
   
<thead>
        <th>ID</th>
        <th>Features</th>
        <th>Status</th>
        <th>Remarks</th>
        <th>Image</th>
        <th>DateTime</th>
</thead> 
   <tbody>
   <?php 


while($row = mysqli_fetch_array($data))
{
    echo '<tr> 
    <td>'.$row['ID'].'</td>
    <td>'.$row['NAME'].'</td>
    <td>'.$row['STATUS'].'</td>
    <td>'.$row['REMARKS'].'</td>
    <td>'.$row['IMAGE'].'</td>
    <td>'.$row['DATETIME'].'</td>
    </tr>

    ';
}

?>
   </tbody>
</table>
<?php 
$var2 = "SELECT count(ID) as ID FROM category";
$data2 = mysqli_query($con, $var2);

while($row = mysqli_fetch_array($data2))
{
echo $row['ID'];
}
?>

<div class="pageno">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">7</a>
    <a href="#">8</a>
</div>

</div>
</div>


<div id="msg"></div>


<?php include'footer.php'; ?>

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
    .pageno{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        margin-top: 1rem;
    }
</style>

    <script src="js/main.js"></script>

<script>
$("#add-btn").click(function() {

   jQuery("#add-btn").attr("disabled", true);
//  
    $.ajax({
        url: "php/action2.php",
        type: "post",
        data: { getdata: '1' },
        success: function(response) {
            //    jQuery("#btn").attr("hidden", true);
            $("#msg").append(response);
            // jQuery("#btn").val("Message");
            //fn_model_scrolly();
        }
    })
});
// fn_remove_ui();
// function fn_remove_ui()
// {
//     $(".div-loading-form").remove();
    
    
// }

</script>