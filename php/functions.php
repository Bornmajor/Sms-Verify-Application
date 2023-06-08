<?php
include('connection.php');

function getSms(){

}

function escapeString($string){
    global $connection;

   $string = mysqli_real_escape_string($connection,$string);

   return $string;

}

 //success msg
 function successMsg($msg){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  //fail msg
  function failMsg($msg){
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  //warning msg
  function warnMsg($msg){
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  function checkQuery($result){
    global $connection;
    if($result){
  
    }else{
        die("Query failed".mysqli_connect_error($connection));
    
    }  
  }

  function getDurationWorked($start_datetime,$end_datetime){
    $start_datetime = new DateTime($start_datetime); 
    $diff = $start_datetime->diff(new DateTime($end_datetime));
    
    return $diff->h;

  }
  function emptyTableRowMsg($query,$msg){
    global $connection;
    
    $total_rows = mysqli_num_rows($query);
    if($total_rows == 0){
        return '<div class="no_row_data">'.$msg.'</div>';
    }


  }
  
?>