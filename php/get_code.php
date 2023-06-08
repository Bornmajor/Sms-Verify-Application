<?php
require '../vendor/autoload.php';

use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;

include('functions.php');



$phone_number = $_POST['phone_number'];
$phone_number = escapeString($phone_number);

$query = "SELECT * FROM users WHERE phone_number = '$phone_number'";
$select_user = mysqli_query($connection,$query);
checkQuery($select_user);
while($row = mysqli_fetch_assoc($select_user)){
$db_phone = $row['phone_number'];

}
if(isset($db_phone)){

$code_msg =  mt_rand(100000,999999);

$query = "UPDATE users SET token = '$code_msg' WHERE phone_number = '$db_phone'";
$update_token = mysqli_query($connection,$query);
checkQuery($update_token);

if($update_token){

//send sms code
$SENDER = "InfoSMS";
$RECIPIENT = $db_phone;
$MESSAGE_TEXT = "Use this code to verify " .$code_msg;


$BASE_URL = "https://r5rqv1.api.infobip.com";
$API_KEY = "03fbf2d12c8c22d7365598ba9ef74c13-29f4171a-b780-4f55-8fe1-e129c534b905";

$configuration = new Configuration(host: $BASE_URL, apiKey: $API_KEY);

$sendSmsApi = new SmsApi(config: $configuration);

$destination = new SmsDestination(
    to: $RECIPIENT
);

$message = new SmsTextualMessage(destinations: [$destination], from: $SENDER, text: $MESSAGE_TEXT);

$request = new SmsAdvancedTextualRequest(messages: [$message]);

try {
    $smsResponse = $sendSmsApi->sendSmsMessage($request);

    echo $smsResponse->getBulkId() . PHP_EOL;

    foreach ($smsResponse->getMessages() ?? [] as $message) {
        sprintf('Message ID: %s, status: %s', $message->getMessageId(), $message->getStatus()?->getName()) . PHP_EOL;
    }
} catch (Throwable $apiException) {
    echo("HTTP Code: " . $apiException->getCode() . "\n");
}



}


successMsg('I have just send you a sms use the code to verify this number');


}else{
     echo '<script>$("#form_code_entry").hide()</script>';
    failMsg('Phone number not available');
   
}
?>

<form action="" method="post" id='form_code_entry'>

<div class="mb-3">
    <div id="feedback_code"></div>
</div>

<input type="hidden" name="phone_number" value='<?php  echo $db_phone; ?>' >

<div class="mb-3">
    <input type="text" id="" class='form-control' placeholder='Enter get code' name='code' required>
</div>

<div class="mb-3">
    <input type="submit" value="Verify code"  style='width:100%;' class='btn btn-primary'>
</div>

</form>


<script>
      $('#form_code_entry').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();
        
        $.post('php/verify.php',postData,function(data){
         $('#feedback_code').html(data);
        })
    })
</script>