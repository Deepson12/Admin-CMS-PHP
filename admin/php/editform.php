<?php
require_once('connection.php');
?>
<?php 
if(isset($_POST['mypost']))
{
$id = $_POST['mypost'];
    $var = "SELECT  ID, STATUS, NAME, IMAGE, REMARKS, DATETIME from category where ID='$id'";
    $data = mysqli_query($con, $var);
                    $row = $data->fetch_all(MYSQLI_ASSOC);


    echo' 
<div id="msg2">
   <form method="post" id="myaction2">
    <div class="class-body" >
    <div class="class-head">
        <div class="class-inner-head">
            <h3 class="inner-head">Edit</h3>
            <button class="class-inner-close" id="class-inner-close">X</button>
        </div>
        <div class="class-inner-body">
            <div class="class-inner-section">
                <label class="class-title">Particular</label>
                <input type="text" class="class-title-input" id="Particular" class="Particular" VALUE="'.$row[0]["NAME"].'" name="Particular">
            </div>

            <div class="class-inner-section">
                <label class="class-title">Status</label>            
<select name="Status" id="Status" class="Status class-title-input">
<option selected disabled value="">---Select Options</option> ';
if($row[0]["STATUS"])
{
echo '<option value="1" selected>Active</option><option value="2">Inacitve</option>';
}
else
{
echo '<option value="1" >Active</option><option selected value="2">Inacitve</option>';

}
echo '</select>
            </div>
      
        <div class="class-inner-section">
        <label class="class-title">message</label>
        <textarea class="class-title-input" id="message-area" rows="4" class="message-area"  name="message-area" type="file">'.$row[0]["REMARKS"].'</textarea>
    </div>
            <button type="submit" id="btn-submit2" class="btn-submit2">Submit</button>
        </div>
    </div>
    </form>
    </div>
    

    <script>

    $("#myaction2").submit(function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append("category_submit2", '.$row[0]["ID"].');
        $.ajax({
        url: "php/category.php",
        type: "POST",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
            setTimeout(function() { window.location.reload(); }, 1000);
            jQuery("#btn-submit2").attr("disabled", false);
        }
    
        });
        });


  $("#class-inner-close").click(function(){
    $("#msg5").empty();
        jQuery("#add-btn").attr("disabled", false);
    });


        </script>';
}else{

}
?>