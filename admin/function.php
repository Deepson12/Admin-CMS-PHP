<?php
?>
<?php
if(function_exists("FN_GetPages") === FALSE)
{
    function FN_GetPages($limit,$currentPages,$WithFilter,$rowcount,$btnclass,$sql)
    {
        include('php/connection.php');
        if($currentPages<=0)
        {
$currentPages = 1;
        }
        $TotalRows = 0;
    /*
        $db = new Database();
        $db->select($sql);
        */
        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                if($WithFilter==99)
                {
                    $TotalRows = mysqli_num_rows($result);
                }
                else
                {
                    $row = $result->fetch_all(MYSQLI_ASSOC);
        $TotalRows= $row[0]['ID'];
        }
                if ($TotalRows <= 0) {
                    $TotalRows = 1;
                }
            } else {
                $TotalRows = 1;
            }
        } else {
            $TotalRows = 1;
        }
        $totalPages = ceil($TotalRows / $limit);
     echo '<div class="pagenumber-div">
    <h4><pre class="h4-page-details">Pages '. $totalPages . ' of ' . $currentPages . '      Records '.$TotalRows. ' of ' . $rowcount .'</pre>'.'</h4>
        <ul class="pagenumber-ul">
           ';
    if($totalPages <=1)
    {
      echo '<li class="pagenumber-li" ><button class="' . $btnclass .' btn_disbled" disabled>' . 'Previous' . '</a></li>';
      echo '<li class="pagenumber-li" ><button class="' . $btnclass .' btn_disbled" disabled>' . 'Next' . '</a></li>';
    }
    else
    {
        if($currentPages<=1)
        {
          echo '<li class="pagenumber-li" ><button class="' . $btnclass .' btn_disbled" disabled dataid="' . '0' . '">' . 'Previous' . '</a></li>';
        }
        else
        {
          echo '<li class="pagenumber-li" ><button class="' . $btnclass .'" fid="' . $WithFilter .'" dataid="' . $currentPages-1 . '">' . 'Previous' . '</a></li>';
        }
        if($currentPages>=$totalPages)
        {
          echo '<li class="pagenumber-li" ><button class="' . $btnclass .' btn_disbled" disabled dataid="' . '0' . '">' . 'Next' . '</a></li>';
        }
        else
        {
          echo '<li class="pagenumber-li" ><button class="' . $btnclass .'" fid="' . $WithFilter .'" dataid="' . $currentPages+1 . '">' . 'Next' . '</a></li>';
        }
      for ($i = 1; $i <= $totalPages+1; $i++) {
          if($currentPages - $i >=0 && $currentPages - $i<=10)
          {
             for($ii=0;$ii<=10;$ii++)
             {
               if($currentPages - $ii>0)
               {
               if($i>0 && $i<=$totalPages)
               {
                  if($currentPages == $i)
                  {
                      echo '<li class="pagenumber-li" ><button class="' . $btnclass .' btn_disbled" disabled fid="' . $WithFilter .'" dataid="' . $i . '">' . $i . '</a></li>';
                  }
                  else
                  {
                      echo '<li class="pagenumber-li"> <button class="' . $btnclass .'" fid="' . $WithFilter .'" dataid="' . $i . '">' . $i . '</a></li>';
                  }
               }
             $i++;  
             }
             else
             {
              if($i>0 && $i<=$totalPages)
              { if($currentPages == $i)
                 {
                     echo '<li class="pagenumber-li" ><button class="' . $btnclass .' btn_disbled" disabled fid="' . $WithFilter .'" dataid="' . $i . '">' . $i . '</a></li>';
                 }
                 else
                 {
                     echo '<li class="pagenumber-li"> <button class="' . $btnclass .'" fid="' . $WithFilter .'" dataid="' . $i . '">' . $i . '</a></li>';
                 }
              }
             $i++;  
             }
             }                             
          }
          else
          {
             if ($i <= $totalPages) {
                 if ($i > 1) {
                     if (($totalPages - $i) > 10) {
                         $i = $i + 10;
                         echo '<li class="pagenumber-li"> <button class="' . $btnclass .'" fid="' . $WithFilter .'" dataid="' . $i . '">' . $i . '</a></li>';
                     } else {
                         $i = $totalPages;
                         echo '<li class="pagenumber-li"> <button class="' . $btnclass .'" fid="' . $WithFilter .'" dataid="' . $i . '">' . $i . '</a></li>';
                     }
                 } else {
                     echo '<li class="pagenumber-li"> <button class="' . $btnclass .'" fid="' . $WithFilter .'" dataid="' . $i . '">' . $i . '</a></li>';
                 }
             }
             else
             {
                 if($totalPages>1)
                 {
                    echo '<li class="pagenumber-li"> <button class="' . $btnclass .'" fid="' . $WithFilter .'" dataid="' . $totalPages . '">Last</a></li>';
                 }
             }
          }
         }
    }
    echo '
        </ul>
    </div>                
    ';
    }
}
?>

<style>



.pagenumber-div,
.h4-page-details,
.pagenumber-li,
.bpgs {
    background-color: rgb(240, 240, 240);
    color: black;
}

.h4-page-details {
    padding: 5px;
    border-bottom: 1px rgb(100, 100, 100) solid;
    text-align: center;
}

.pagenumber-li {
    display: block;
    float: left;
}

.bpgs {
    border: 1px black solid;
    padding: 5px 10px;
    margin: 5px;
    border-radius: 5px;
    transition: 200ms;
    min-width: 30px;
    font-size: 12px;
}

.bpgs:hover {
    color: black;
    border-color: black;
    transition: 200ms;
    background-color: rgb(230, 230, 230);
    cursor: pointer;
}

.btn_disbled {
    background-color: rgb(200, 200, 200);
    color: black;
    cursor: no-drop;
}

.btn_disbled:hover {
    cursor: no-drop;
}




</style>