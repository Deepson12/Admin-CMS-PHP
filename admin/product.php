<?php include'header.php'; ?>

<div class="div-data-view-body">
<div class="div-data-view-ch-body">
<div class="div-data-view-head">
    <h3 class="h3-head">Product Account</h3>
</div>

 <?php  include'searchbar.php'; ?> 

<div class="head-text-box">
    <div class="head-text-area">
        <h3>All Feature Details</h3> 
         <button class="add-btn" id="add-btn">Add New</button>
    </div>
</div>

<?php
require_once('php/connection.php');



?>


<div id="msg7"></div>
</div>
</div>

<div id="msg8"></div>






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

    .error-msg{
        float: right;
    }

    #msg8{
        position: absolute;
        display: flex;
    }
</style>
<script src="js/main.js"></script>
<script>
$("#add-btn").click(function() {

   jQuery("#add-btn").attr("disabled", true);
//  
    $.ajax({
        url: "php/action3.php",
        type: "post",
        data: { getdata: '1' },
        success: function(response) {
            //    jQuery("#btn").attr("hidden", true);
            $("#msg8").append(response);
            // jQuery("#btn").val("Message");
            //fn_model_scrolly();
        }
    })
});
FN_LoadData(1);
function FN_LoadData(page)
{
    $.ajax({
     url: "php/table2.php",
     type: "post",
     data: { getdata3: '1',page:page },
     success: function(response) {
         //    jQuery("#btn").attr("hidden", true);
         $("#msg7").empty();
         $("#msg7").append(response);
         // jQuery("#btn").val("Message");
         //fn_model_scrolly();
     }
 })

}

</script>