<?php 
include('functions.php');

$code = $_POST['code'];
$code = escapeString($code);

$phone_number = $_POST['phone_number'];
$phone_number = escapeString($phone_number);

$query = "SELECT * FROM users WHERE phone_number = '$phone_number'";
$select_token = mysqli_query($connection,$query);
checkQuery($select_token);
while($row = mysqli_fetch_assoc($select_token)){
  $token =  $row['token'];

}

if($code == $token){
     successMsg('Phone number verified successfully');

     echo '<script>
     window.setTimeout(function() {

        $(".check_btns").slideUp();
        $(".thank_you").slideDown(2000);

    }, 2000);
     </script>';
}else{
    failMsg('Sms code is incorrect');
}

?>