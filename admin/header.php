<?php
session_start();

if(isset($_SESSION["my__website"])) {

}else{
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="side">
   <div class="side_menu">
       <ul>
       <li><a href=""><i class="uil uil-dashboard"></i><h7 class="hd-txt"> Dashboard </h7></a></li>
       <li><a href="category.php"><i class="uil uil-apps"></i><h7 class="hd-txt"> Category</h7></a></li>
       <li><a href="product.php"><i class="uil uil-box"></i><h7 class="hd-txt"> Product</h7></a></li>
       <li><a href=""><i class="uil uil-list-ul"></i><h7 class="hd-txt"> Orderlist</h7></a></li>
       <li><a href=""><i class="uil uil-user"></i><h7 class="hd-txt"> Admin</h7></a></li>
       <li><a href="signout.php"><i class="uil uil-user"></i><h7 class="hd-txt"> Signout</h7></a></li>

       </ul>
   </div>
    </div>
    <!-- <a href="logout.php"> <button id="logOut">Logout</button></a> -->



    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        list-style: none;
    }

    .side{
        margin: 0;
        padding: 0;
        background: red;
        width: 200px;
        height: 100vh;
        float: left;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 10);
    }
    .side_menu{
        margin-left: 1rem;
      
    }

    .side_menu li{
        padding: 1rem;
    }

    .side_menu a{
        color: white;
    }

    .side_menu a:hover{
        color: yellow;
    }

    .h3-head{
        display: flex;
        justify-content: center;
        margin-top: 1rem;
    }

    .di-body{
        display: flex;
        padding: 5px;
        justify-content: center;
    }

    .search-gl{
        width: 100%;
        max-width: 700px;
        background: rgba(155, 155, 155, 0.2);
        display: flex;
        align-items: center;
        border-radius: 60px;
        padding: 5px 20px;
        margin-top: 1rem;
        box-shadow: 5px 5px 5px rgba(0, 0, 0, .9);
    }

    .search-gl input{
        background: transparent;
        flex: 1;
        border: 0;
        outline: none;
        padding: 5px;
        color: #000;
    }

    .search-gl button i{
        width: 25px;
        color: red;
    }

    .search-gl button{
        border: 0;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        background-color: white;
        cursor: pointer;
    }

    .head-text-box{
        background: rgba(155, 155, 155, 0.2);
        margin-top: 2rem;
        height: 2.6rem;
    }
    
    .head-text-area{
        margin: 10px;
        padding: 5px 5px;
    }
    .head-text-area h3{
        float: left;
    }


    .add-btn{
        float: right;
        border: 0;
        width: 7rem;
        height: 30px;
        background-color: red;
        color: white;
        border-radius: 10px;
        cursor: pointer;
    }
    table{
        margin-top: 1rem;
        width: 100%;
        border-collapse: collapse;
        border: 1px solid grey;
    }
    table th{
        text-align: center;
        background-color: red;
        color: white;

        padding: 4px 30px 4px 8px;
    }

    table td{
        border-bottom: 1px solid grey;
        padding: 10px 15px;
        text-align: center;
        font-weight: bold;
    }

    table tr:nth-child(odd) td{
        background-color: lightgrey;
    }
    @media screen and (max-width: 632px) {
        .hd-txt{
            display: none;
        }
        .side{
            width: 80px;
        }

    }

</style>