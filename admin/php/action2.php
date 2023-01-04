<?php 
if (isset($_POST['getdata']))
{
    echo '
    <div id="msg2">
    <form method="post" id="myaction">
    <div class="class-body" >
    <div class="class-head">
        <div class="class-inner-head">
            <h3 class="inner-head">Sign in</h3>
            <button class="class-inner-close" id="class-inner-close">X</button>
        </div>
        <div class="class-inner-body">
            <div class="class-inner-section">
                <label class="class-title">Particular</label>
                <input type="text" class="class-title-input" id="Particular" class="Particular" name="Particular">
            </div>
            <div class="class-inner-section">
                <label class="class-title">Status</label>            
<select name="Status" id="Status" class="Status class-title-input">
<option selected disabled value="">---Select Options</option>
<option value="1">Active</option>
<option value="2">Inacitve</option>
</select>
            </div>
      

            <div class="class-inner-section">
            <label class="class-title">image</label>
            <input class="class-title-input" id="img" class="img" name="img" type="file">
            <div class="response-msgs"
            <div class="error-msg" name="error-msg" id="error-msg"></div>
            </div>
        </div>
        <div class="class-inner-section">
        <label class="class-title">message</label>
       <button type="submit" id="btn-submit" class="btn-submit">Submit</button>
        </div>
    </div>
    </form>
</div>
    
    <script>

    $("#myaction").submit(function(e) {
        e.preventDefault();
        var Particular = $("#Particular").val();
        var Status = $("#Status").val();
        var img = $("#img").val();
        var  message= $("#message-area").val();
        $("#error-msg").empty();
        if (Particular == "") {
            $("#error-msg").append("Please write a Particular");
            jQuery("#Particular").focus();
        } else if (Status == "" || Status == null) {
        jQuery("#Status").focus("Please select a status");
        $("#error-msg").append();
        } else if (img == "") {
            $("#error-msg").append("Please select a Image");
            jQuery("#img").focus();
        }else if (message == "") {
            jQuery("#message-area").focus();
            $("#error-msg").append("Please write a message");
         } else {
        $("#error-msg").append("successfully inserted");
        jQuery("#btn-submit").val("Saving...");
        jQuery("#btn-submit").attr("disabled", true);
        var formdata = new FormData(this);
        formdata.append("category_submit", "1");
        $.ajax({
        url: "php/category.php",
        type: "POST",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
            setTimeout(function() { window.location.reload(); }, 1000);
            jQuery("#btn-submit").attr("disabled", false);       <textarea class="class-title-input" id="message-area" rows="4" class="message-area" name="message-area" type="file"></textarea>
    </div>
           
      
         /*
            var res = JSON.parse(response);
        if (res.hasOwnProperty("success")) {
        $(".error-msg").append(divstart1 + res.success + divend);
        setTimeout(function() { window.location.reload(); }, 1000);
        } else if (res.hasOwnProperty("error")) {
        jQuery("#btn_submit").val("Submit");
        jQuery("#btn_submit").attr("disabled", false);
        $(".error-msg").append(divstart2 + res.error + divend);
        
        } else {
        jQuery("#btn_submit").val("Submit");
        jQuery("#btn_submit").attr("disabled", false);
        $(".error-msg").append(divstart2 + res.error + divend);
        }*/
        }
    
        });
        }
        });


  $("#class-inner-close").click(function(){
    $("#msg5").empty();
        jQuery("#add-btn").attr("disabled", false);
    });
/*
    $("#myaction").submit(function(e) {
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
  */
        </script>';

    
}else{
    echo "url not found";
}

?>