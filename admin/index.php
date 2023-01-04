<html lang="en">
<?php 
session_start();

if(isset($_SESSION["my__website"])) {
    header("location:dashboard.php");
}else{

}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
        <div class="div-input-body">
            <div class="div-input-head">
                <h3 class="h3-head">Admin Login</h3>
            </div>
            <div class="div-input-form">
                <form method="POST" id="fm_login">
<div class="div-input-group">
    <label class="lb-input">Username <b class="b-red">*</b></label>
    <input type="text" class="tx-input" id="tx_username" name="tx_username" required maxlength="30" placeholder="Username*">
    <label class="fm-error" id="fm-error"></label>
</div>
<div class="div-input-group">
    <label class="lb-input">Password <b class="b-red">*</b></label>
    <input type="password" class="tx-input" id="tx_password" name="tx_password" required maxlength="20" placeholder="Password*">
    <label class="fm-error" id="fm-error"></label>
</div>
<div class="div-input-group">
<button type="submit" id="btn-form">Submit</button>
</div>
                </form>

<div class="div-response" id="div-response">
    
</div>

       
            </div>
        </div>
</body>
</html>


<style>
    *
    {
        padding: 0;
        margin: 0;
        font-family: sans-serif;
    }
    .div-input-body
    {
        background-color: white;
        width: 95vw;
        max-width: 700px;
        margin: 50px auto;
        box-shadow: 5px 5px 10px black;
    }
    .div-input-group{
        padding: 15px 10px;
    }
    .h3-head
    {
        padding: 5px 10px;
        background-color: darkmagenta;
        color: white;
    }
    .b-red
    {
        font-size: 18px;
        color: red;
    }
    .tx-input
    {
        float: right;
        width: calc(100% - 120px);
        margin-right: 5px;
        padding: 8px 9px;

    }

    #btn-form{
    display: inline-block;
	background: darkmagenta;
	color: white;
	padding: 1rem 2rem;
	border: 1px solid transparent;
	font-weight: bolder;
    margin-left: 120px;
    }

    .fm-error{
        font-size: 13px;
        float: right;
        color: red;
    }
    .h3-error
    {
        display: flex;
        align-items: center;
        justify-content: center;
        color: red;
        background-color: darkred; 
        font-size: 13px;
    }

    .h3-success{
        display: flex;
        align-items: center;
        justify-content: center;
        color: lime;
        background-color: darkgreen;
        font-size: 13px;
    }
/*
    .fm-login-error{
        display: flex;
        align-items: center;
        justify-content: center;
        color: red;
        background-color: darkred;
    }

    .fm-login-success{
        display: flex;
        align-items: center;
        justify-content: center;
        color: lime;
        background-color: darkgreen;
    }

    */
</style>
<script type="text/javascript" src="js/main.js"></script>

<script>
    var error = '<h3 class="h3-error">';
    var success = '<h3 class="h3-success">';
    var end = '</h3>';

</script>

<script type="text/javascript">
    $("#fm_login").submit(function(e) {
 e.preventDefault();

 var formdata = new FormData(this);
 formdata.append("upload", "1");
 $.ajax({
 url: "php/action.php",
 type: "POST",
 data: formdata,
 processData: false,
 contentType: false,
 success: function(response) {
    //  var res = JSON.parse(response);
//  if (res.hasOwnProperty("success")) {
 
//  setTimeout(function() { window.location.reload(); }, 1000);
//  } else if (res.hasOwnProperty("error")) {
 
//  } 

window.location.reload();

 }
 });
 
 });
</script>