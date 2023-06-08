<?php include('includes/header.php'); ?>
<meta name="description" content="">
    <title>Home</title>
</head>
<body>
<div class="main_container" style='display:flex;align-items:center;justify-content:center;'><!--container-->

<div class="check_in_img_container"><!--check_in_img_container-->


<div class="img_container"><!--img_container-->
    <img src="images/sms.png" width='100%' alt="Hello">
</div><!--img_container-->

<div class="check_in_fm"><!--checkin-->

<div class='thank_you'><?php successMsg('Thank you for your response'); ?></div>

<div class="check_btns"><!--check_btns-->


<div class="alert alert-dark" role="alert">
   SMS VERIFY APPLICATION
</div>

<form action="" method="post" id='form_verify' autocomplete='off'>
   
    <div class="mb-3">
        <input type="number" id="" class='form-control' placeholder='Enter phone number' name='phone_number' required>
    </div>
    <div class="mb-3">
        <input type="submit" value="Get code"  style='width:100%;'class='btn btn-primary'>
    </div>
    
</form>

<div class="mb-3">
        <div id="feedback"></div>
</div>


</div><!--check_btns-->

</div><!--checkin-->

</div><!--check_in_img_container-->


</div><!--container-->
<?php include('includes/footer.php'); ?>