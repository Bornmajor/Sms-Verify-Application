$(document).ready(function(){

    $('#form_verify').submit(function(e){
      e.preventDefault();
      let postData = $(this).serialize();

      
      $.post('php/get_code.php',postData,function(data){

        $('#feedback').html(data);

   

      })
    })

  
})